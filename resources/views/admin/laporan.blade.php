@extends('layouts.admin')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Paket</th>
        <th scope="col">Kategori</th>
        <th scope="col">No HP</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Tanggal Pick Up</th>
        <th scope="col">Harga</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($pemesanan as $item)
        <tr>
          <th scope="row">{{ $no }}</th>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->paket->nama }}</td>
          <td>{{ $item->paket->kategori->nama}}</td>
          <td>{{ $item->no_hp }}</td>
          <td>{{ $item->tanggal }}</td>
          <td>{{ $item->tgl_pickup }}</td>
          <td>{{ $item->paket->harga }}</td>
        </tr>
        @php
            $no++;
        @endphp
        @endforeach
    </tbody>
</table>
@endsection