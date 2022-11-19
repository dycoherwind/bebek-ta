@extends('layouts.main')

@section('css')
<link
rel="stylesheet"
href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>
<style>
    .swiper {
    width: 600px;
    height: 300px;
    }
    .kiri
    {
        padding: 10px;
        margin-top: 0px;
        margin-right: 80px;
        width: 600px;
    }
    .kanan
    {
        width: 330px;
        margin-top: -415px;
        margin-bottom: 20px;
        margin-right: 75px;
        float: right;
    }
    .btn-kategori:hover{
        background-color: #c88a72;
        color: white;
        border: 1px solid #c88a72;
    }
    .btn-kat{
        background-color: #c88a72;
        color: white;
        border: 1px solid #c88a72;
    }
</style>
@endsection

@section('content')
<div class="container mb-3 py-4">
    <div>
        <div class="w-100 row">
            <div class="col-4">
                <img src="img/logo1.png" class="w-100" alt="">
            </div>
            <div class="col-1"></div>
            <div class="col-6 py-5 mt-2">
                <h2 style="font-family: 'Imprima', sans-serif;">We Have The Best</h2>
                <p class="display-3" style="font-family: 'Imprima', sans-serif;">Restoration Service</p>
                <h5 style="font-family: 'Imprima', sans-serif;" >Restorasi Motor adalah sebuah seni dalam membangun dan
                    mengembalikan suatu kenangan dan ingatan tentang motor
                    yang anda cintai.</h5>
            </div>
        </div>
        <div class="mb-4">
            <h5 > 
                PILIH MOTOR YANG INGIN ANDA RESTORASI 
            </h5>
        </div>
        <div class="d-flex" id="kategori" style="text-align: center">
            @foreach ($kategori as $item)
            <button type="button" onclick="detail('{{ $item->id }}')" class="card text-decoration-none text-muted" style="width: 18rem; border: none; background-color:black">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('kategori/motor/'.$item->img.'') }}" class="rounded-circle px-4 card-img-top" style="width: 150px; height: 100px" alt="...">
                </div>
                <div class="w-100 card-body d-flex justify-content-center">
                  <p class="card-text text-white">{{ $item->nama }}</p>
                </div>
            </button>
            @endforeach
        </div>
        <div class="mt-3"></div> 

        <div class="d-none" id="paket">
            <div class="d-flex justify-content-center mb-3" id="listDetail">

            </div>
            <div class="d-flex justify-content-center" id="paketDetail">

            </div>
        </div>

        
        <div class="mt-3"></div> 

        <!-- About -->
        <section id="about">
            <div class="row justify">
                <div class="col-md-5 float-center p-2">
                    <img src="{{ asset('img/logo5.jpeg') }}" width="510" height="370" alt="">
                </div>
                <div class="col p-4 mt-5 ml-4 mr-5 offset-mr-1" style="margin-left: 100px">
                    <h4 class="text-center" style="color: white; font-family: 'Times New Roman', Times, serif">Tentang Kita</h4>
                    <p class="text-justify ml-4" style="font-family: 'Times New Roman', Times, serif; font-size:14pt;">Bebek Restorasi adalah sebuah jasa restorasi motor Astrea Series yang berada di Dukuh Gesikan, Kelurahan Sidoarum, Kecamatan Godean, Kabuapaten Sleman, D.I. Yogyakarta. Bebek Restorasi tidak hanya menyediakan jasa restorasi tapi juga menyediakan jas perzinc perbautan, Vaporblasting , Powder coating, Nano Coating. Terdapat banyak pilihan paket Restorasi yang dapat dipilih sesuai keinginan anda. </p>
                
                </div>
            </div>
        </section>

        {{-- deskripsi website --}}
        <div class="justify-content-center">
            <div class="md-6 mt-4">
                <div class="d-flex justify-content-center flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" style="color: white" class="bi bi-award" viewBox="0 0 16 16">
                        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
                        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                    </svg><div class="p-2" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"> Pelayanan Terbaik</div>
                    <div class="mx-4"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color: white" fill="currentColor" class="bi bi-person-heart" viewBox="0 0 16 16">
                        <path d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z"/>
                    </svg><div class="p-2" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Paham Keinginan Anda</div>
                    <div class="mx-4"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" style="color: white" class="bi bi-balloon-heart" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"/>
                    </svg><div class="p-2" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Family Friendly</div>
                </div>
                <div class="mt-5"></div>
                <div class="d-flex justify-content-center flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" style="color: white" class="bi bi-alarm" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                    </svg><div class="p-2" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Back To Memories</div>
                    <div class="mx-4"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-chat" style="color: white" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg><div class="p-2" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Ramah</div>
                    
                </div>
            </div>
        </div>

        <div class="mt-5"></div>
        <div></div>
        <div class="mt-5"></div>

        {{-- slideshow --}}
        <section id="galeri">
            <div class="col-md-10 mx-auto">
                <div class="main-carousel">
                    <!-- Slider main container -->
                    <div class="swiper w-100">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/4.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/5.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/6.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/7.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/8.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/9.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/10.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/11.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                            <div class="carousel-cell swiper-slide">
                                <img src="{{asset('img/slide/12.jpg')}}"  width="270px" height="280px" alt="">
                            </div>                            
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>          
            </div>
        </section>

        <div class="mt-4"></div> 

        {{-- contact --}}
        <section id="contact">
            <div class="row justify">
                <div class="col-md-6 ml-4 float-center p-4">
                    <div class="mt-2 ml-4 px-5 py-5">
                        <h4 class="mb-4" style="color: white; font-family: 'Times New Roman', Times, serif">Contact Us</h4>
                        <div class="d-flex mb-2"></div>
                        <div class="d-flex mb-4">
                            <div onclick="email()" class="d-flex align-items-center text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" style="color: white" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                                <span class="ml-2" style="margin-left: 1rem; font-family: 'Times New Roman', Times, serif; font-size:14pt;">{{ env('EMAIL') }}</span>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div onclick="instagram()" class="d-flex align-items-center text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" style="color:white" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                                <span class="ml-2" style="margin-left: 1rem; font-family: 'Times New Roman', Times, serif; font-size:14pt;">{{ env('INSTAGRAM') }}</span>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div onclick="whatsapp()" class="d-flex align-items-center text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" style="color: white" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg> 
                                <span class="ml-2" style="margin-left: 1rem; font-family: 'Times New Roman', Times, serif; font-size:14pt;">{{ env('WHATSAPP') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mt-5 offset-md-1 ml-n5">
                    {{-- <img src="{{ asset('img/cs.png')}}"style="margin-left: 100px" width="300" height="260" alt=""> --}}
                </div>
            </div>
        </section>
        
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 3,
        spaceBetween: 0.5,
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    function email(){
        window.open("mailto:{{ env('EMAIL') }}");
    }

    function instagram(){
        window.open("{{ env('INSTAGRAM_LINK') }}");
    }

    function whatsapp(){
        window.open("{{ env('WHATSAPP_LINK') }}");
    }

    function detail(id, list = 'detailing'){
        var id = id;
        $.ajax({
            url: '{{ route("paket.data") }}',
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                list: list
            },
            success: function(data){
                var div = '';
                $('#listDetail').html(`
                <button onclick="list(`+id+`, 'detailing')"  style="background-color: yellow; color: black;" type="button" class="btn btn-secondary">Detailing</button>
                <div class="mx-2"></div>
                <button onclick="list(`+id+`, 'restorasi')" style="border: 1px yellow solid; color: yellow;" type="button" class="btn btn-outline-secondary">Restorasi</button>`);
                $.each(data, function(key, value){
                    var json = JSON.parse(value.img);
                    console.log(json[0]);
                    div += `<a href="detail/`+value.id+`" class="nav-link card" style="width: 14rem; color: black">
                                <img src="{{ asset('paket/`+json[0]+`') }}" class="card-img-top" alt="...">
                                <div class="card-body" style="color:black">
                                <h5 class="card-title">`+value.nama+`</h5>
                                <p class="card-text">Rp`+value.harga+`</p>
                                </div>
                            </a>
                            <div class="mx-2"></div>`;
                })
                $('#paketDetail').html(div);
                $('#paket').removeClass('d-none');
            }
        })
    }

    function list(idk, listk){
        $.ajax({
            url: '{{ route("paket.data") }}',
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                id: idk,
                list: listk
            },
            success: function(data){
                var div = '';
                $('#paketDetail').html(div);
                if(listk == 'detailing'){
                    $('#listDetail').html(`
                    <button onclick="list(`+idk+`, 'detailing')" style="background-color: yellow; color: black;" type="button" class="btn btn-secondary">Detailing</button>
                    <div class="mx-2"></div>
                    <button onclick="list(`+idk+`, 'restorasi')" style="border: 1px yellow solid; color: yellow;" type="button" class="btn btn-outline-secondary">Restorasi</button>`);
                } else {
                    $('#listDetail').html(`
                    <button onclick="list(`+idk+`, 'detailing')" style="border: 1px yellow solid; color: yellow;" type="button" class="btn btn-outline-secondary">Detailing</button>
                    <div class="mx-2"></div>
                    <button onclick="list(`+idk+`, 'restorasi')" style="background-color: yellow; color: black;" type="button" class="btn btn-secondary">Restorasi</button>`);
                }
                $.each(data, function(key, value){
                    var json = JSON.parse(value.img);
                    console.log(json[0]);
                    div += `<a href="detail/`+value.id+`" class="nav-link card" style="width: 14rem;">
                                <img src="{{ asset('paket/`+json[0]+`') }}" class="card-img-top" alt="...">
                                <div class="card-body" style="color: black">
                                <h5 class="card-title">`+value.nama+`</h5>
                                <p class="card-text">Rp`+value.harga+`</p>
                                </div>
                            </a>
                            <div class="mx-2"></div>`;
                })
                $('#paketDetail').html(div);
                $('#paket').removeClass('d-none');
            }
        })
    }
</script>
@endsection