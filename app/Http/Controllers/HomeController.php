<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\KategoriMotor;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $kategori = KategoriMotor::all();
        return view('landing', compact('title', 'kategori'));
    }

    public function paketData(Request $request)
    {
        $paket = Paket::where('kategori_id', $request->id)
                ->where('list', $request->list)
                ->get();
        return $paket;
    }

    public function detail($id)
    {
        $paket = Paket::find($id);
        $title = $paket->nama." ".$paket->kategori->nama;
        return view('detail', compact('paket', 'title'));
    }
}
