<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index()
    {
        $title = 'Profil User';
        return view('user.profil', compact('title'));
    }

    public function simpan(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->save();
        return redirect()->route('profil');
    }
}
