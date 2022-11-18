@extends('layouts.admin')

@section('css')
    
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
        @php
            $pesananss = App\Models\Pesanan::count();
        @endphp
    <h3>{{ $pesananss }}</h3>
    <p>Pemesanan</p>
    </div>
    <div class="icon">
    <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-4 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
        @php
            $kategoriss = App\Models\KategoriMotor::count();
        @endphp
    <h3>{{ $kategoriss }}</h3>
    <p>Kategori</p>
    </div>
    <div class="icon">
    <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-4 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
        @php
            $paketss = App\Models\Paket::count();
        @endphp
    <h3>{{ $paketss }}</h3>
    <p>Paket</p>
    </div>
    <div class="icon">
    <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    </div>
@endsection

@section('js')
    
@endsection