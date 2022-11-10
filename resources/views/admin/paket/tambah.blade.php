@extends('layouts.admin')

@section('css')
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 400px;
        }
    </style>
@endsection

@section('content')
<div class="card card-info">

    @if (isset($paket))
        
    <div class="card-header">
        <h3 class="card-title">Ubah Paket Restorasi</h3>
    </div>
        
    <form action="{{ route('admin.paket.edit') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $paket->id }}">
        <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Paket</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Paket" value="{{ $paket->nama }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori Motor</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-select">
                        <option disabled>-Pilih-</option>
                        @foreach ($kategori as $item)
                        <option {{ ($paket->kategori_id == $item->id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="list" class="col-sm-2 col-form-label">List</label>
                <div class="col-sm-10">
                    <select name="list" class="form-select">
                        <option disabled>-Pilih-</option>
                        <option {{ ($paket->list == 'detailing') ? 'selected' : '' }} value="detailing">Detailing</option>
                        <option {{ ($paket->list == 'restorasi') ? 'selected' : '' }} value="restorasi">Restorasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Paket</label>
                <div class="col-sm-10">
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Paket" value="{{ $paket->harga }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="durasi" class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                <div class="col-sm-10">
                    <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Pengerjaan" value="{{ $paket->durasi }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{!! $paket->deskripsi !!}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="input-group col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="foto[]" multiple class="custom-file-input" id="exampleInputFile" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" id="exampleInputFileLabel" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="prevImg">
                <label for="foto" class="col-sm-2 col-form-label">Preview</label>
                <div class="col-sm-10" id="prevDiv">
                </div>
            </div>
        </div>
    
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route('admin.paket') }}" role="button" class="btn btn-default float-right">Batalkan</a>
        </div>
    
    </form>

    @else

    <div class="card-header">
        <h3 class="card-title">Tambah Paket Restorasi</h3>
    </div>
        
    <form action="{{ route('admin.paket.simpan') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Paket</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Paket">
                </div>
            </div>
            <div class="form-group row">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori Motor</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-select">
                        <option selected disabled>-Pilih-</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="list" class="col-sm-2 col-form-label">List</label>
                <div class="col-sm-10">
                    <select name="list" class="form-select">
                        <option selected disabled>-Pilih-</option>
                        <option value="detailing">Detailing</option>
                        <option value="restorasi">Restorasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Paket</label>
                <div class="col-sm-10">
                    <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Paket">
                </div>
            </div>
            <div class="form-group row">
                <label for="durasi" class="col-sm-2 col-form-label">Durasi Pengerjaan</label>
                <div class="col-sm-10">
                    <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Pengerjaan">
                </div>
            </div>
            <div class="form-group row">
                <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="input-group col-sm-10">
                    <div class="custom-file">
                        <input type="file" name="foto[]" multiple class="custom-file-input" id="exampleInputFile" accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" id="exampleInputFileLabel" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="prevImg">
                <label for="foto" class="col-sm-2 col-form-label">Preview</label>
                <div class="col-sm-10" id="prevDiv">
                </div>
            </div>
        </div>
    
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route('admin.paket') }}" role="button" class="btn btn-default float-right">Batalkan</a>
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
                const amount = this.files.length;
                var filename = '';
                for(i = 0; i < amount; i++){
                    var reader = new FileReader();
                    console.log(reader)
                    reader.onload = function(event){
                        $($.parseHTML('<img>')).addClass('mx-1').width('150px').height('200px').attr('src', event.target.result).appendTo($('#prevDiv'));
                    }
                    reader.readAsDataURL(this.files[i]);
                    filename += this.files[i].name+"; ";
                }
                $('#exampleInputFileLabel').html(filename);
                $('#prevImg').show();
            })
        })
    </script>

    {{-- ckeditor js --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#deskripsi' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection