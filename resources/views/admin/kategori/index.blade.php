@extends('layouts.admin')

@section('css')
    
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h3>Kategori Motor</h3>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.kategori.tambah') }}" role="button">(+) Tambah</a>
        </div>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kategori Motor</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no = 1;
          @endphp
          @foreach ($kategori as $item) 
          <tr>
            <th scope="row">{{ $no }}</th>
            <td>{{ $item->nama }}</td>
            <td>
              <img src="{{ asset('kategori/motor/'.$item->img.'') }}" class="rounded-circle px-4 card-img-top" style="width: 150px; height: 100px">
            </td>
            <td>
              <div class="d-flex">
                <a href="{{ route('admin.kategori.ubah', ['id' => $item->id]) }}" class="btn btn-primary mx-2">Edit</a>
                <a href="{{ route('admin.kategori.hapus', ['id' => $item->id]) }}" class="btn btn-danger">Hapus</a>
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