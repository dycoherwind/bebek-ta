@extends('layouts.main')

@section('css')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endsection

@section('content')
<div class="container">
</div>

<form action="{{ route('user.bayar.simpan') }}" method="post" id="form-submit">
    @csrf
    <input type="hidden" name="order_id" value="{{ $id }}">
    <input type="hidden" name="json" id="json_callback">
</form>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        window.snap.pay('{{ $token }}', {
            onSuccess: function(result){
            /* You may add your own implementation here */
            // alert("payment success!"); console.log(result);
            send_response(result);
            },
            onPending: function(result){
            /* You may add your own implementation here */
            // alert("wating your payment!"); console.log(result);
            send_response(result);
            },
            onError: function(result){
            /* You may add your own implementation here */
            // alert("payment failed!"); console.log(result);
            send_response(result);
            },
            onClose: function(){
            /* You may add your own implementation here */
            alert('Apakah anda yakin menutup popup? Pembayaran belum diselesaikan');
            }
        })

        function send_response(result){
            $('#json_callback').val(JSON.stringify(result));
            $('#form-submit').submit();
        }
    })
</script>
@endsection