@extends('layouts.main')

@section('css')
    @php
      $title = 'Masuk';
    @endphp
@endsection

@section('content')
    <div class="container py-5">
        <div class="card" style="border: none; box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 40%); background-color:black">
            <div class="card-body" style="padding: 0;">
                <div class="row g-0">
                    <div class="col-md-6">
                      <img src="{{ asset('img/k1.png') }}" class="w-100 h-100 rounded-start" alt="logo-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body py-5" style="padding-left: 4rem; padding-right: 4rem;">
                            <h2>Masuk</h2>
                            <form action="{{ route('login') }}" method="post" class="mt-4" >
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <button type="submit" class="w-100 py-2 mt-4 btn btn-primary" style="background-color: yellow; color: black">Masuk</button>
                                <div class="row g-1 mt-4">
                                    <div class="col-4">
                                        <span>Belum punya akun?</span>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('register') }}" class="ml-2" style="color: yellow">Daftar</a>
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
