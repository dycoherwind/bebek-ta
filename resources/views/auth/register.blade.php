@extends('layouts.main')

@section('css')
    @php
      $title = 'Daftar';
    @endphp
@endsection

@section('content')
    <div class="container py-5">
        <div class="card" style="border: none; box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 40%);">
            <div class="card-body" style="padding: 0;">
                <div class="row g-0">
                    <div class="col-md-6">
                      <img src="{{ asset('img/logo7.jpg') }}" class="w-100 h-100 rounded-start" alt="logo-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body py-5" style="padding-left: 4rem; padding-right: 4rem;">
                            <h2>Daftar</h2>
                            <form action="{{ route('register') }}" method="post" class="mt-4">
                                @csrf
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="mb-2">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                </div>
                                <button type="submit" class="w-100 py-2 mt-4 btn btn-primary">Daftar</button>
                                <div class="row g-1 mt-4">
                                    <div class="col-4">
                                        <span>Sudah punya akun?</span>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('login') }}" class="ml-2">Masuk</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
