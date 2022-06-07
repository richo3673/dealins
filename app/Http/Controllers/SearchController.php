<?php

namespace App\Http\Controllers;

use App\Models\Dealin;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $cari = strtolower($request->cari);
        $kota = $request->kota;
        //Menambahkan ke riwayat pencarian
        if (Auth::check()) {
            if (isset($cari)) {
                $search = Search::where('search', $cari)->where('user_id',Auth::user()->id)->first();
                if (isset($search)) {
                    $val = $search->dicari;
                    Search::where('search', $cari)->where('user_id',Auth::user()->id)->update(['dicari' => ($val + 1)]);
                } else {
                    $search = new Search();
                    $search->user_id = Auth::user()->id;
                    $search->search = $cari;
                    $search->save();
                }
            }
        }
        //Mencari iklan
        if (isset($cari) && !isset($kota)) {
            $dealin = Dealin::where('judul', 'ilike', '%' . $cari . '%')->get();
        } elseif (isset($kota) && !isset($cari)) {
            $dealin = Dealin::where('kota', 'ilike', '%' . $kota . '%')->orWhere('kecamatan', 'ilike', '%' . $kota . '%')->get();
        } else {
            $dealin = Dealin::where('judul', 'ilike', '%' . $cari . '%')->where(function ($query) use ($kota) {
                $query->where('kota', 'ilike', '%' . $kota . '%')->orWhere('kecamatan', 'ilike', '%' . $kota . '%');
            })->get();;
        }
        if ($dealin) {
            return view('dashboard', compact('cari', 'kota'))->with(['dealins' => $dealin]);
        }
    }
}
