<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLaporanController extends Controller
{
    public function index()
    {
        $title = 'Admin | Laporan';
        $pemesanan = Pesanan::all();
        return view('admin.laporan', compact('title', 'pemesanan'));
    }
}
