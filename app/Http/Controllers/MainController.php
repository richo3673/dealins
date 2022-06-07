<?php

namespace App\Http\Controllers;

use App\Models\Dealin;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{

    public function home()
    {
        $dealin = Dealin::all()->sortByDesc('id');

        //Menampilkan rekomendasi , berdasarkan riwayat pencarian terbanyak pengguna
        if (Auth::check()) { //Apabila user telah login
            $search = Search::where('user_id', Auth::user()->id)->orderBy('dicari', 'DESC')->first(); //cek riwayat pencarian terbanyak
            if (isset($search)) {
                $cari = $search->search; //ambil nilai dari kolom search
                $recommendation = Dealin::where('judul', 'ilike', '%' . $cari . '%')->take(4)->get(); //ambil iklan dari tabel dealin berdasarkan kolom judul ilike $cari
                if (isset($recommendation)) {
                    return view('dashboard')->with(['dealins' => $dealin])->with(['recommendation' => $recommendation]);
                } else {
                    return view('dashboard')->with(['dealins' => $dealin]);
                }
            } else {
                return view('dashboard')->with(['dealins' => $dealin]);
            }
        } else {
            return view('dashboard')->with(['dealins' => $dealin]);
        }
    }

    public function byUserId()
    {
        # code...

        $dealin = Dealin::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('showmine')->with(['dealins' => $dealin]);
    }


    public function edit( $id)
    {
        # code...
        $dealin = Dealin::find($id);
        return view('edit', ['dealin' => $dealin]);
    }

    public function create()
    {
        return view('add');
    }

    public function pengaturan()
    {
        return view('pengaturan');
    }


}
