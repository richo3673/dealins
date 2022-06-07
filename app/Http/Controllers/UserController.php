<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
            return redirect()->route('profile')->with('success', 'Profil berhasil dupdate !');
        } else {
            return redirect()->route('profile')->with('error', 'Ooops, Perbuahan gagal disimpan !');
        }
    }
    public function deleteUser(Request $request)
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {
            return redirect()->route('home')->with('success', 'Akun anda berhasil dihapus');
        }
    }
}
