@extends('layouts.user')

@section('content')
<div class="container pr-5 w-100">
  <div class="mt-4">
    <h3>Pesanan</h3>
    <div class="mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="https://www.bebekrestorasi.com">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
            </ol>
        </nav>
    </div>
  </div>
  <table class="table">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Nama Paket</th>
          <th class="text-center">Tanggal Pickup</th>
          <th class="text-center">Status Pembayaran</th>
          <th class="text-center">Pemberitahuan</th>
          <th class="text-center">Informasi Dari Admin</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($pesanan))    
        @php
            $no = 1;
        @endphp
        @foreach ($pesanan as $item) 
        <tr>
          <th class="text-center">{{ $no }}</th>
          <td class="text-center">{{ $item->paket->nama }}</td>
          <td class="text-center">{{ $item->tgl_pickup }}</td>
          <td class="text-center">{{ $item->status }}</td> 
          <td class="text-center">
            @php
                $date = strtotime($item->tgl_pickup);
                $remaining = $date - time();
                $days_remaining = floor($remaining / 86400);
                echo $days_remaining." hari menuju penjemputan";
            @endphp  
          </td> 
          <td class="text-center">{{ $item->status }}</td> 
          <td>
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