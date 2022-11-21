@extends('layouts.main')

@section('content')
<div class="container">
    <div class="mt-3 w-100" >
        <form action="{{ route('user.simpanSewa') }}" method="POST" id="form-pesan">
            @csrf
            <input type="hidden" name="paket_id" value="{{ $paket->id }}">
            <h4 class="text-center" style="color: white; font-family: 'Times New Roman', Times, serif">Formulir Pemesanan</h4><br>
            <div class="form-group mb-3">
                <label for="paket" style="font-family: 'Times New Roman', Times, serif">Paket</label>
                <input type="text" class="form-control" value="{{ $paket->nama." ".$paket->kategori->nama }}" name="paket" id="paket" placeholder="nama" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="nama" style="font-family: 'Times New Roman', Times, serif">Nama</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama" id="nama" placeholder="nama">
            </div>
            <div class="form-group mb-3">
                <label for="hp" style="font-family: 'Times New Roman', Times, serif">No Hp</label>
                <input type="text" class="form-control" value="" name="no_hp" id="hp" placeholder="No HP">
            </div>
            <div class="form-group mb-3">
                <label for="hp" style="font-family: 'Times New Roman', Times, serif">Tanggal Pick up</label>
                <input type="date" class="form-control" value="" name="tgl" id="tgl">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="provinsi" style="font-family: 'Times New Roman', Times, serif">Provinsi</label>
                        <select id="provinsi" onchange="showCities()" class="form-select">
                            <option value="0" selected disabled>-Pilih-</option>
                            @foreach ($provinsi as $item)                        
                            <option value="{{ $item->province_id."|".$item->province }}">{{ $item->province }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="provinsi">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="city" style="font-family: 'Times New Roman', Times, serif">Kota</label>
                        <select id="city" name="kota" class="form-select">
                            <option selected disabled>-Pilih-</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="detail_alamat" style="font-family: 'Times New Roman', Times, serif">Detail Alamat</label>
                <textarea class="form-control" id="detail_alamat" name="detail_alamat" rows="2" placeholder="Detail Alamat"></textarea>
            </div>
            <div id="button-form">
                <button type="submit" class="btn btn-secondary">
                    Pesan Sekarang
                </button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Biaya Pengiriman</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: black">
                Lokasi anda berada diluar DI Yogyakarta. Segala atktifitas tentang pengiriman atau pengantaran unit di luar tanggung jawab kami Dan Untuk biaya dan proses pengiriman unit akan ditanggung anda sendiri. Apakah Anda Setuju ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="setuju()">Setuju</button>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        function showCities(){
            var prov = document.getElementById('provinsi').value;
            var province = prov.split("|");
            if(province != 0){
                if(province[0] != 5){
                    $('#button-form').html(`<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Pesan Sekarang
                                        </button>`);
                } else {
                    $('#button-form').html(`<button type="submit" class="btn btn-secondary">
                                            Pesan Sekarang
                                        </button>`);
                }

                $.ajax({
                    url: '{{ route("kota") }}',
                    type: 'GET',
                    data: {
                        province: province[0]
                    },
                    success: function(data){
                        $('#city').removeAttr('disabled');
                        $('#city').find('option').remove().end().append('<option value="0" selected disabled>--Pilih Kota--</option>');
                        $.each(data, function(index, value){
                            $('#city').append('<option value="'+value.city_name+'">'+value.city_name+'</option>');
                        });
                        $('input[name=provinsi]').val(province[1])
                    }
                });
            } else {
                $('#city').attr('disabled', 'disabled');
                $('#city').empty();
                $('#city').append('<option selected disabled>--Pilih Kota--</option>');
            }
        }

        function setuju(){
            $('#form-pesan').submit();
        }
    </script>
@endsection