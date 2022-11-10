<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\Api\RajaOngkirController;

class PesananController extends Controller
{
    public function index($id)
    {
        $title = 'Pesan Sekarang';
        $paket = Paket::find($id);
        $provinsi = RajaOngkirController::semuaProvinsi();
        return view('user.pesan', compact('title', 'paket', 'provinsi'));
    }

    public function simpan(Request $request)
    {
        $pesanan = new Pesanan();
        $pesanan->user_id = auth()->user()->id;
        $pesanan->paket_id = $request->paket_id;
        $pesanan->nama = $request->nama;
        $pesanan->tanggal = Carbon::now();
        $pesanan->tgl_pickup = $request->tgl;
        $pesanan->no_hp = $request->no_hp;
        $pesanan->alamat = $request->detail_alamat.", ".$request->kota.", ".$request->provinsi;
        $pesanan->status = 'menunggu';
        $pesanan->save();

        if($pesanan){
            $user = array(
                'nama' => $request->nama,
                'email' => auth()->user()->email,
                'hp' => $request->no_hp
            );
            $user = json_encode($user);
            $paket = Paket::find($request->paket_id);
            $token = MidtransController::config($pesanan->id, $paket->harga, $user);

            return redirect()->route('user.bayar', ['token' => $token, 'id' => $pesanan->id]);
        }
    }

    public function bayar($token, $id)
    {
        $title = 'Bayar';
        return view('user.bayar', compact('title', 'token', 'id'));
    }

    public function simpanBayar(Request $request)
    {
        $json = json_decode($request->json);
        
        $transaksi = new Transaksi();
        $transaksi->pesanan_id = $request->order_id;
        $transaksi->transaksi_id = $json->transaction_id;
        $transaksi->biaya = $json->gross_amount;
        $transaksi->tipe_pembayaran = $json->payment_type;
        $transaksi->waktu_transaksi = $json->transaction_time;
        $transaksi->status_transaksi = $json->transaction_status;
        $transaksi->bank = $json->va_numbers[0]->bank ?? null;
        $transaksi->nomor_va = $json->va_numbers[0]->va_number ?? null;
        $transaksi->status_fraud = $json->fraud_status;
        $transaksi->pdf_url = $json->pdf_url ?? null;
        $transaksi->status_pembayaran = $json->transaction_status;
        $transaksi->save();

        $pesanan = Pesanan::find($request->order_id);
        if($json->transaction_status == 'settlement'){
            $pesanan->status = 'lunas';
            $pesanan->save();
        }

        return redirect('nota/'.$transaksi->id);
    }

    public function nota($id)
    {
        $transaksi = Transaksi::find($id);
        return view('user.kwitansi', compact('transaksi'));
    }
}
