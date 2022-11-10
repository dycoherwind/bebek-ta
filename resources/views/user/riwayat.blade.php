@extends('layouts.main')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID Transaksi</th>
        <th scope="col">Nama Paket</th>
        <th scope="col">Total Pembayaran</th>
        <th scope="col">Status Pembayaran</th>
        <th scope="col">Tipe Pembayaran</th>
        <th scope="col">Bank</th>
        <th scope="col">Nomor VA</th>
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
        <th scope="row">{{ $no }}</th>
        <td class="text-nowrap">{{ $item->transaksi_id }}</td>
        <td class="text-nowrap">{{ $item->pesanan->paket->nama }}</td>
        <td class="text-nowrap">{{ $item->biaya }}</td>
        <td class="text-nowrap">{{ $item->status_pembayaran }}</td>
        <td class="text-nowrap">{{ $item->tipe_pembayaran }}</td>
        <td class="text-nowrap">{{ $item->bank }}</td>
        <td class="text-nowrap">{{ $item->nomor_va }}</td>
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
@endsection