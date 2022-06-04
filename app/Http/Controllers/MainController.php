<?php

namespace App\Http\Controllers;

use App\Models\Dealin;
use App\Models\User;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MainController extends Controller
{

    public function home()
    {
        $dealin = Dealin::all()->sortByDesc('id');
        return view('dashboard')->with(['dealins' => $dealin]);
    }

    public function byUserId(Request $request)
    {
        # code...

        $dealin = Dealin::where('user_id', Auth::user()->id)->get();
        return view('showmine')->with(['dealins' => $dealin]);
    }

    public function show(Request $request, $id)
    {
        # code...
        $dealin = Dealin::find($id);
        $user = $dealin->user_id;
        $viewer = Auth::user()->id;
        $kontak = User::where('id', $user)->get(['telepon', 'facebook','name']);

        $cek = Riwayat::where('user_id', $viewer)->where('iklan_id', $id)->first();
        $jumlah_view = Riwayat::where('iklan_id', $id)->get();
        if($cek){
            Riwayat::where('user_id', $viewer)->where('iklan_id', $id)->update(['updated_at' => Carbon::now()]);
        }
        else{
            $riwayat = new Riwayat();
            $riwayat->iklan_id = $id;
            $riwayat->user_id = $viewer;
            $riwayat->save();
        }
        return view('show')->with(['dealin' => $dealin])->with(['kontak' => $kontak])->with(['jumlah_view' => $jumlah_view]);
    }

    public function edit(Request $request, $id)
    {
        # code...
        $dealin = Dealin::find($id);
        return view('edit', ['dealin' => $dealin]);
    }

    public function update(Request $request, $id)
    {
        # Validations before updating
        $dealin = Dealin::where('user_id', Auth::user()->id)->where('id', $id)->first();

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/Image'), $filename);
                $dealin->file_path = $filename;
            }
            $dealin->judul = $request->judul;
            $dealin->kategori = $request->kategori;
            $dealin->kondisi = $request->kondisi;
            $dealin->harga = $request->harga;

            $dealin->desc = $request->desc;
            $dealin->kelurahan = $request->kelurahan;
            $dealin->kecamatan = $request->kecamatan;
            $dealin->kota = $request->kota;
            $dealin->provinsi = $request->provinsi;
            if ($dealin->save()) {
                $user = $dealin->user_id;
                $kontak = User::where('id', $user)->get(['telepon', 'facebook']);
                return redirect()->route('mine');
            }
    }

    public function create(Request $request)
    {
        # code...
        return view('add');
    }

    public function store(Request $request)
    {
        # Validations before updating

        $dealin = new Dealin;

        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg, png, jpg, gif, svg|max:2048'

        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $dealin->file_path = $filename;
        }

        $dealin->judul = $request->judul;
        $dealin->kategori = $request->kategori;
        $dealin->kondisi = $request->kondisi;
        $dealin->harga = $request->harga;

        $dealin->desc = $request->desc;
        $dealin->kelurahan = $request->kelurahan;
        $dealin->kecamatan = $request->kecamatan;
        $dealin->kota = $request->kota;
        $dealin->provinsi = $request->provinsi;
        $dealin->user_id = Auth::user()->id;

        if ($dealin->save()) {
//            return view('show', ['dealin' => $dealin]);
            return redirect()->route('mine');
        }
        return; // 422
    }

    public function delete(Request $request, $id)
    {
        # code...
        $dealin = Dealin::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if ($dealin) {
            $dealin->delete();
            return redirect()->route('mine');
        } else {
            echo "gagal";
        }
        return; // 404
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $kota = $request->kota;
        if(isset($cari) && !isset($kota)) {
            $dealin = Dealin::where('judul', 'like', '%' . $cari . '%')->get();
        }
        elseif(isset($kota) && !isset($cari)){
            $dealin = Dealin::where('kota', 'like', '%' . $kota . '%')->orWhere('kecamatan', 'like', '%' . $kota . '%')->orWhere('kelurahan', 'like', '%' . $kota . '%')->get();
        }
        else{
            $dealin = Dealin::where('judul', 'like', '%' . $cari . '%')->where(function($query) use ($kota) {$query->where('kota', 'like', '%' . $kota . '%')->orWhere('kecamatan', 'like', '%' . $kota . '%')->orWhere('kelurahan', 'like', '%' . $kota . '%');})->get();;
        }
        if ($dealin) {
            return view('dashboard', compact('cari', 'kota'))->with(['dealins' => $dealin]);
        }
    }

    public function showProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('profile')->with(['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->nama;
        $user->telepon = $request->telepon;
        $date = date("Y-m-d", strtotime($request->tanggal_lahir));
        $user->tanggal_lahir = $date;
        $user->facebook = $request->facebook;
        if ($user->save()) {
            return redirect()->route('profile');
        }
    }

    public function riwayat(){
        $riwayat = Riwayat::where('user_id', Auth::user()->id)->get();
//        $id = array();
//        foreach ($riwayat as $riwayats) {
//            $id[] = $riwayats->iklan_id;
//        }
//        $dealin = Dealin::whereIn('id', $id)->orderBy($riwayat->created_at, 'DESC')->get();
        $dealin = Dealin::join('riwayats', 'riwayats.iklan_id','=','dealins.id')->where('riwayats.user_id',Auth::user()->id )->orderBy('riwayats.updated_at', 'desc')->get();
        return view('history')->with(['dealins' => $dealin]);
    }
}
