@extends('layouts.user')

@section('content')
<div class="container pr-5 w-100">
    <div class="mt-4">
      <h3>Profil</h3>
      <div class="mt-4">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://www.bebekrestorasi.com">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
              </ol>
          </nav>
      </div>
    </div>


    <form action="" method="POST">
      @csrf                
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="{{ auth()->user()->name }}" class="form-control" style="border:1px black solid" id="nama">
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" style="border:1px black solid" id="email">
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="form-group mb-3">
            <label for="kota">No Hp</label>
            <input type="text" name="no_hp" value="{{ auth()->user()->no_hp }}" class="form-control" style="border:1px black solid" id="kota">
          </div>
          <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" style="border:1px black solid" rows="5">{{ auth()->user()->alamat }}</textarea>
          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Simpan</button>
    </form>
  </div>
@endsection