<?php

namespace App\Http\Controllers;

use App\Models\Dealin;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DealinController extends Controller
{

    public function show($id)
    {
        $dealin = Dealin::find($id);
        $user = $dealin->user_id;
        $kontak = User::where('id', $user)->get(['telepon', 'facebook', 'name']);
        $jumlah_view = Riwayat::where('iklan_id', $id)->get();
        if (Auth::check()) {
            $viewer = Auth::user()->id;
            $cek = Riwayat::where('user_id', $viewer)->where('iklan_id', $id)->first();
            if ($cek) {
                $val = $cek->dilihat;
                Riwayat::where('user_id', $viewer)->where('iklan_id', $id)->update(['updated_at' => Carbon::now(), 'dilihat' => ($val + 1)]);
            } else {
                $riwayat = new Riwayat();
                $riwayat->iklan_id = $id;
                $riwayat->user_id = $viewer;
                $riwayat->dilihat = 1;
                $riwayat->save();
            }
            return view('show')->with(['dealin' => $dealin])->with(['kontak' => $kontak])->with(['jumlah_view' => $jumlah_view]);
        } else {
            return view('show')->with(['dealin' => $dealin])->with(['kontak' => $kontak])->with(['jumlah_view' => $jumlah_view]);
        }
    }

    public function store(Request $request)
    {
        $dealin = new Dealin;
        if($request->has('foto')) {
        $this->validate($request, [
            'foto.*' => 'image|mimes:jpeg, png, jpg, gif, svg|max:2048'
        ]);
            $path = $request->file('foto')->store('images', 's3');
            $dealin->file_path = basename($path);
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
            return redirect()->route('mine')->with('success', 'Iklan berhasil dipasang!');
        } else {
            return redirect()->route('mine')->with('error', 'Ooops, iklan gagal diunggah !');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image.*' => 'image|mimes:jpeg, png, jpg, gif, svg|max:2048'
        ]);

        $dealin = Dealin::where('user_id', Auth::user()->id)->where('id', $id)->first();
        $path = $request->file('image')->store('images', 's3');
        $dealin->file_path = basename($path);
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
            return redirect()->route('mine')->with('success', 'Iklan berhasil dupdate !');;
        } else {
            return redirect()->route('mine')->with('error', 'Ooops, Perbuahan gagal disimpan !');
        }
    }
    public function delete(Request $request, $id)
    {
        $dealin = Dealin::where('user_id', Auth::user()->id)->where('id', $id)->first();
        $path = $dealin->file_path;
        Storage::disk('s3')->delete('images/'.$path);
        if ($dealin) {
            $dealin->delete();
            return redirect()->route('mine')->with('success', 'Iklan berhasil dihapus !');
        } else {
            return redirect()->route('mine')->with('error', 'Ooops, iklan gagal dihapus !');
        }
    }
}
