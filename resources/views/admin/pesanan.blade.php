@extends('layouts.admin')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Paket</th>
        <th scope="col">No HP</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Harga</th>
        <th scope="col">Status Pembayaran</th>
        <th scope="col">Komentar</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($pesanan as $item)
        <tr>
          <th scope="row">{{ $no }}</th>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->paket->nama }}</td>
          <td>{{ $item->no_hp }}</td>
          <td>{{ $item->tanggal }}</td>
          <td>{{ $item->paket->harga }}</td>
          <td>{{ $item->status }}</td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" onclick="modall({{ $item->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Komentar
            </button>
          </td>
        </tr>
        @php
            $no++;
        @endphp
        @endforeach
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Rasah Kakean Komentar Su!!!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.pesanan.komentar') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <input type="hidden" name="id">
          <div class="mb-3">
            <label for="komentar">Komentar</label>
            <textarea name="komentar" id="komentar" class="form-control" rows="10"></textarea>
          </div>
          <div class="mb-3">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function modall(id){
    document.querySelector('input[name=id]').value = id;
  }
</script>
@endsection