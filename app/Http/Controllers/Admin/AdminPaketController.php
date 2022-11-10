<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriMotor;
use App\Models\Paket;
use Illuminate\Http\Request;

class AdminPaketController extends Controller
{
    public function index()
    {
        $title = 'Admin | Paket';
        $paket = Paket::all();
        return view('admin.paket.index', compact('title', 'paket'));
    }

    public function tambah()
    {
        $title = 'Admin | Tambah Paket';
        $kategori = KategoriMotor::all();
        return view('admin.paket.tambah', compact('title', 'kategori'));
    }

    public function simpan(Request $request)
    {
        $paket = new Paket();
        $paket->nama = $request->nama;
        $paket->kategori_id = $request->kategori;
        $paket->list = $request->list;
        $paket->harga = $request->harga;
        $paket->durasi = $request->durasi;
        $paket->deskripsi = $request->deskripsi;
        if($request->hasFile('foto')){
            foreach($request->file('foto') as $foto){
                $filename = rand() . $foto->getClientOriginalName();
                $foto->move(public_path() . '/paket', $filename );
                $data[] = $filename;
            }
            $paket->img = json_encode($data);
            $paket->save();
        }
        return redirect()->route('admin.paket');
    }

    public function ubah($id)
    {
        $title = 'Admin | Ubah Paket';
        $paket = Paket::find($id);
        $kategori = KategoriMotor::all();
        return view('admin.paket.tambah', compact('title', 'paket', 'kategori'));
    }

    public function edit(Request $request)
    {
        $paket = Paket::find($request->id);
        $paket->nama = $request->nama;
        $paket->kategori_id = $request->kategori;
        $paket->list = $request->list;
        $paket->harga = $request->harga;
        $paket->durasi = $request->durasi;
        $paket->deskripsi = $request->deskripsi;
        if($request->hasFile('foto')){
            foreach($request->file('foto') as $foto){
                $filename = rand() . $foto->getClientOriginalName();
                $foto->move(public_path() . '/paket', $filename );
                $data[] = $filename;
            }
            $paket->img = json_encode($data);
        }
        $paket->save();
        return redirect()->route('admin.paket');
    }

    public function hapus($id)
    {
        $paket = Paket::find($id);
        $paket->delete();
        return redirect()->route('admin.paket');
    }
}
