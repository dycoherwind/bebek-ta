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
}
