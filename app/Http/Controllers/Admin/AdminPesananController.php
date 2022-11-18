<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function index()
    {
        $title = 'Admin | Pesanan';
        $pesanan = Pesanan::where('status', 'lunas')
                    ->get();
        return view('admin.pesanan', compact('title', 'pesanan'));
    }

    public function komentar(Request $request)
    {
        $pesanan = Pesanan::find($request->id);
        $pesanan->komentar = $request->komentar;
        if($request->hasFile('file')){
            $filename = rand() . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path() . '/pesanan', $filename );
            $pesanan->file = $filename;
        }
        $pesanan->save();
        return redirect()->route('admin.pesanan');
    }
}
