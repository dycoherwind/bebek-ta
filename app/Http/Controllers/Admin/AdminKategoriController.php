<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\KategoriMotor;
use App\Http\Controllers\Controller;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $title = 'Admin | Kategori';
        $kategori = KategoriMotor::all();
        return view('admin.kategori.index', compact('title', 'kategori'));
    }
    
    public function tambah()
    {
        $title = 'Admin | Tambah Kategori';
        return view('admin.kategori.tambah', compact('title'));
    }
    
    public function simpan(Request $request)
    {
        $kategori = new KategoriMotor();
        $kategori->nama = $request->kategori;
        if($request->file('foto')){
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path() . '/kategori/motor', $filename );
            $kategori->img = $filename;
            $kategori->save();
        }

        return redirect()->route('admin.kategori');
    }

    public function ubah($id)
    {
        $title = 'Admin | Ubah Kategori';
        $kategori = KategoriMotor::find($id);
        return view('admin.kategori.tambah', compact('title', 'kategori'));
    }

    public function edit(Request $request)
    {
        $kategori = KategoriMotor::find($request->id);
        $kategori->nama = $request->kategori;
        if($request->file('foto')){
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path() . '/kategori/motor', $filename );
            $kategori->img = $filename;
            $kategori->save();
        }

        return redirect()->route('admin.kategori');
    }

    public function hapus($id)
    {
        $kategori = KategoriMotor::find($id);
        $kategori->delete();
        return redirect()->route('admin.kategori');
    }
}
