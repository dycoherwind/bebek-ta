@extends('layouts.user')

@section('content')
<div class="container pr-5 w-100">
  <div class="mt-4">
    <h3>Riwayat Pembayaran</h3>
    <div class="mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="https://www.bebekrestorasi.com">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Riwayat Pembayaran</li>
            </ol>
        </nav>
    </div>
  </div>
  <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Transaksi</th>
          <th scope="col">Nama Paket</th>
          <th scope="col">Total Pembayaran</th>
          <th scope="col">Status Pembayaran</th>
          <th scope="col">Tipe Pembayaran</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($transaksi))    
        @php
            $no = 1;
        @endphp
        @foreach ($transaksi as $item) 
        <tr>
          <th class="text-center">{{ $no }}</th>
          <td class="text-wrap">{{ $item->transaksi_id }}</td>
          <td class="text-center">{{ $item->pesanan->paket->nama }}</td>
          <td class="text-center">{{ $item->biaya }}</td>
          <td class="text-center">{{ $item->status_pembayaran }}</td>
          <td class="text-center">{{ $item->tipe_pembayaran }}</td>
          <td>
            <div class="d-flex">
              <a onclick="window.open('{{ $item->pdf_url }}')" download="" class="btn btn-success">Download</a>
            </div>
          </td>
        </tr>
        @php
            $no++;
        @endphp
        @endforeach
        @endif
      </tbody>
  </table>
</div>
@endsection