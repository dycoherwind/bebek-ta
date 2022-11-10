@extends('layouts.admin')

@section('css')
    
@endsection

@section('content')
<div class="card card-info">

    @if (isset($kategori))
        
    <div class="card-header">
        <h3 class="card-title">Ubah Kategori Motor</h3>
    </div>
        
    <form action="{{ route('admin.kategori.edit') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $kategori->id }}">
        <div class="card-body">
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori Motor</label>
                <div class="col-sm-10">
                <input type="text" value="{{ $kategori->nama }}" name="kategori" class="form-control" id="kategori" placeholder="Kategori">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="input-group col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" id="exampleInputFileLabel" for="exampleInputFile">{{ $kategori->img }}</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="prevImg">
                <label for="foto" class="col-sm-2 col-form-label">Preview</label>
                <div class="col-sm-10">
                    <img src="{{ asset('kategori/motor/'.$kategori->img.'') }}" class="w-25" id="preview">
                </div>
            </div>
        </div>
    
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route('admin.kategori') }}" role="button" class="btn btn-default float-right">Batalkan</a>
        </div>
    
    </form>

    @else
        
    <div class="card-header">
        <h3 class="card-title">Tambah Kategori Motor</h3>
    </div>
        
    <form action="{{ route('admin.kategori.simpan') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori Motor</label>
                <div class="col-sm-10">
                <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="input-group col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" id="exampleInputFileLabel" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="prevImg">
                <label for="foto" class="col-sm-2 col-form-label">Preview</label>
                <div class="col-sm-10">
                    <img src="" class="w-25" id="preview">
                </div>
            </div>
        </div>
    
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route('admin.kategori') }}" role="button" class="btn btn-default float-right">Batalkan</a>
        </div>
    
    </form>

    @endif

</div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#prevImg').hide();
            $('#exampleInputFile').change(function() {
                const file = this.files[0];
                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        $('#prevImg').show();
                        $('#preview').attr('src', event.target.result);
                    }
                    $('#exampleInputFileLabel').html(file.name);
                    reader.readAsDataURL(file);
                }
            })
        })
    </script>
    @if (isset($kategori))
        <script>
            $(document).ready(function(){
                $('#prevImg').show();
            })
        </script>
    @endif
@endsection