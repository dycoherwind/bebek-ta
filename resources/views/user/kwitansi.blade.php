@extends('layouts.main')

@section('content')
@php
    $title='Bebek Restorasi';
@endphp

    <div class="no-print w-50 mt-4 mx-auto d-flex justify-content-end p-2" >
        <a href="" id="cetak"  class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            </svg>
            <span class="ml-2" >Cetak Halaman</span>
        </a>
    </div>
    <div class="card w-50 mx-auto" id="card">
        
        <div class="card-body">
            <div class="row">
                <div class="col-sm mr-auto">
                    <img src="{{ asset('img/logo1.png') }}" width="80px" height="105px" alt=""> 
                 </div>
                 <div class="col-sm ml-5">
                     <p class="text-right" style="color: black">Bebek Retorasi <br>Jl. Godean km 7.5, RT 06/03 <br> Godean, Sleman <br>Telp:089515338394</p>
                 </div>
                 
            </div>
            <div class="d-flex justify-content-center my-3" style="color: black">
                <h4>KWITANSI PEMBAYARAN</h4>
            </div>
            <div class="d-flex justify-content-left my-3" style="color: black">
              <p>{{ Carbon\Carbon::parse($transaksi->updated_at)->format('d M Y H:i:s') }}</p>
            </div>
            <div class="mt-4 pt-2">
                
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($transaksi->biaya != $transaksi->pesanan->paket->harga)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $transaksi->pesanan->nama }}</td>
                        <td>
                          {{ $transaksi->tipe_pembayaran }}
                        </td>
                        <td>
                          Rp. {{ number_format($transaksi->pesanan->paket->harga, 0, 0, '.') }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>
                          DP
                        </td>
                        <td>
                          Rp. {{ number_format($transaksi->biaya, 0, 0, '.') }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>
                          Sisa
                        </td>
                        <td>
                          Rp. {{ number_format(($transaksi->pesanan->paket->harga - $transaksi->biaya), 0, 0, '.') }}
                        </td>
                      </tr>
                      @else 
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $transaksi->pesanan->nama }}</td>
                        <td>
                          {{ $transaksi->tipe_pembayaran }}
                        </td>
                        <td>
                          Rp. {{ number_format($transaksi->biaya, 0, 0, '.') }}
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Total</td>
                        <td>Rp. {{ number_format($transaksi->biaya, 0, 0, '.') }}</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
            </div>

            <div class="w-50 mt-4 ml-auto  mx-auto d-flex justify-content-end p-1" style="color: black">
              <p>Terima Kasih</p>
            </div>
            <div class="w-50 mt-3 mx-auto d-flex justify-content-end pr-4 pb-2">
              <img src="{{ asset('img/logo45.png') }}" width="100px" height="60px" alt="">
            </div>
 
        </div>
    </div>
     
    <div class="w-50 mt-2 mx-auto no-print">
        <a href="" role="button" class="btn btn-success">Kembali</a>
    </div>


<script>
    var cetak = document.querySelector('#cetak');
    var card = document.querySelector('#card');
    cetak.addEventListener('click', function(){
        window.print();
    });
</script>

@endsection