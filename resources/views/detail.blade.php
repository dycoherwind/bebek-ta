@extends('layouts.main')

@section('css')
<link
rel="stylesheet"
href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>    
@endsection

@section('content')
<div class="container">
    <div class="w-100 mt-3 rounded p-2 breadcrumb bg-light">
        <li class="breadcrumb-item ml-5"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="/">{{ $paket->kategori->nama }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $paket->nama }}</li>
    </div>

    <div class="row py-2">
        <div class="col-lg-6">
            <div class="w-100 overflow-hidden">
                <div class="swiper w-100">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach (json_decode($paket->img) as $item)
                        <div class="carousel-cell swiper-slide">
                            <img src="{{ asset('paket/'.$item) }}" height="500" alt="">
                        </div>  
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="right-content">
                <div class="w-100 mb-4">
                    <h2><b>{{ $paket->nama }}</b></h2>
                </div>
    
                <div id="accordion mt-3">
                    <div class="card bg-light border-secondary">
                        <div class="card-body mt-3 d-flex justify-content-center">
                            <h4>Rp{{ number_format($paket->harga, 0, '', '.') }}</b></h4>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span>Durasi Pengerjaan : {{ $paket->durasi }}</span>
                        </div>
                    </div>
        
                    <div class="mt-4 mr-4 row">
                        <div class="col-md-4">
                            <a href="https://wa.me/{{ env('WHATSAPP') }}" role="button" class="btn btn-secondary w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                <span>Kirim Pesan</span>
                            </a>
                        </div>      
                        <div class="col-md-8">
                            <a href="{{ route('pesan-sekarang', ['id' => $paket->id]) }}" role="button" id="pesan" class="btn btn-secondary w-100 mx-1">Pesan Sekarang</a>
                        </div>                      
                    </div>
    
                    <div class="mt-3 ">
                        <hr>
                        <p><b>Details</b> </p><hr>
                    </div>
                    <div id="collapseOne" class="collapse show " data-parent="#accordion">
                        <div class="card-body font-weight-light">
                            {!! $paket->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 0.5,
        autoplay: {
        delay: 3500,
        disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
@endsection