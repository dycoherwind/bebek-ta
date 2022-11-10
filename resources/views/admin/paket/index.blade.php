@extends('layouts.admin')

@section('css')
    
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h3>Paket Restorasi Motor</h3>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.paket.tambah') }}" role="button">(+) Tambah</a>
        </div>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Paket Restorasi</th>
            <th scope="col">Harga</th>
            <th scope="col">Durasi</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($paket as $item) 
          <tr>
            <th scope="row">{{ $no }}</th>
            <td class="text-nowrap">{{ $item->nama }}</td>
            <td class="text-nowrap">{{ $item->harga }}</td>
            <td class="text-nowrap">{{ $item->durasi }}</td>
            <td class="">{!! \Illuminate\Support\Str::words($item->deskripsi, 6) !!}</td>
            <td>
                @php
                    $img = json_decode($item->img);
                @endphp
              <img src="{{ asset('paket/'.$img[0].'') }}" style="width: 75px; height: 100px">
            </td>
            <td>
              <div class="d-flex">
                <a href="{{ route('admin.paket.ubah', ['id' => $item->id]) }}" class="btn btn-primary mx-2">Edit</a>
                <a href="{{ route('admin.paket.hapus', ['id' => $item->id]) }}" class="btn btn-danger">Hapus</a>
              </div>
            </td>
          </tr>
          @php
              $no++;
          @endphp
          @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    
@endsection