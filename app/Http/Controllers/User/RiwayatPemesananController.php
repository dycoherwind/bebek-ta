<?php

namespace App\Http\Controllers\User;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiwayatPemesananController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pesanan')
                    ->whereHas('pesanan', function($q){
                        $q->where('user_id', auth()->user()->id);
                    })
                    ->get();
        $title = 'Riwayat Pemesanan';
        return view('user.riwayat', compact('title', 'transaksi'));
    }
}
