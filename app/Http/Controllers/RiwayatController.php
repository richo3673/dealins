<?php

namespace App\Http\Controllers;

use App\Models\Dealin;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function riwayat()
    {
        $dealin = Dealin::join('riwayats', 'riwayats.iklan_id', '=', 'dealins.id')->where('riwayats.user_id', Auth::user()->id)->orderBy('riwayats.updated_at', 'desc')->get();
        return view('history')->with(['dealins' => $dealin]);
    }

    public function hapusRiwayat()
    {
        $riwayat = Riwayat::where('user_id', Auth::user()->id)->get();
        if ($riwayat) {
            $riwayat->each->delete();
            return redirect()->route('pengaturan')->with('success', 'Riwayat berhasil dihapus!');
        } else {
            return redirect()->route('pengaturan')->with('error', 'Ooops, riwayat tidak ditemukan!');
        }
    }
}
