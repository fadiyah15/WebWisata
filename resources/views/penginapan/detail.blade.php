@extends('adminlte::page')
@section('title', 'Detail Penginapan')
@section('content_header')
<h1 class="m-0 text-dark">Detail Penginapan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_penginapan" class='form-label'>Nama Penginapan</label>
                    <div class="form-input">
                        : {{$penginapan -> nama_penginapan ?? old('nama_penginapan')}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi" class='form-label'>Deskripsi</label>
                    <div class="form-input">
                        : {{$penginapan -> deskripsi ?? old('deskripsi')}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="fasilitas" class='form-label'>Fasilitas</label>
                    <div class="form-input">
                        : {{$penginapan -> fasilitas ?? old('fasilitas')}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="foto1" class="form-label">Foto 1</label>
                    <div class="form-input">
                        @if(isset($penginapan) && $penginapan->foto1)
                            <span style="margin-right: 5px;">:</span>
                            <img src="{{asset('storage/Foto penginapan/' . $penginapan->foto1)}}" style="max-width: 20%; max-height: 20%;" alt="Deskripsi Gambar">
                        @else
                            : -
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="foto2" class="form-label">Foto 2</label>
                    <div class="form-input">
                        @if(isset($penginapan) && $penginapan->foto2)
                            <span style="margin-right: 5px;">:</span>
                            <img src="{{asset('storage/Foto penginapan/' . $penginapan->foto2)}}" style="max-width: 20%; max-height: 20%;" alt="Deskripsi Gambar">
                        @else
                            : -
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="foto3" class="form-label">Foto 3</label>
                    <div class="form-input">
                        @if(isset($penginapan) && $penginapan->foto3)
                            <span style="margin-right: 5px;">:</span>
                            <img src="{{asset('storage/Foto penginapan/' . $penginapan->foto3)}}" style="max-width: 20%; max-height: 20%;" alt="Deskripsi Gambar">
                        @else
                            : -
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="foto4" class="form-label">Foto 4</label>
                    <div class="form-input">
                        @if(isset($penginapan) && $penginapan->foto4)
                            <span style="margin-right: 5px;">:</span>
                            <img src="{{asset('storage/Foto penginapan/' . $penginapan->foto4)}}" style="max-width: 20%; max-height: 20%;" alt="Deskripsi Gambar">
                        @else
                            : -
                        @endif
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="foto5" class="form-label">Foto 5</label>
                    <div class="form-input">
                        @if(isset($penginapan) && $penginapan->foto5)
                            <span style="margin-right: 5px;">:</span>
                            <img src="{{asset('storage/Foto penginapan/' . $penginapan->foto5)}}" style="max-width: 20%; max-height: 20%;" alt="Deskripsi Gambar">
                        @else
                            : -
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    @auth
                        <a href="{{ route('penginapan.index') }}" class="btn btn-primary">Kembali</a>
                    @else
                        <a href="{{ route('homepage') }}" class="btn btn-primary">Kembali</a>
                    @endauth
                </div>            
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
        });
</script>
<style>
.form-group {
    display: flex;
    align-items: flex-start; /* Mengubah align-items menjadi flex-start */
    margin-bottom: 1px;
}

.form-label {
    flex: 1;
    margin-right: 4px;
}

.form-input {
    flex: 3;
    display: flex;
    align-items: flex-start;
    position: relative;
    font-size: 16px;
    line-height: 1.5;
    overflow: auto; /* Tambahkan properti overflow */
}

@media(max-width:512px) {
    .form-group {
        display: flex;
        align-items: flex-start; /* Mengubah align-items menjadi flex-start */
        margin-bottom: 5px;
    }
    
    .form-label {
        flex: 1;
        margin-right: 8px;
        font-size: 10px;
        
    }
    .form-input {
        flex: 2;
        display: flex;
        align-items: flex-start;
        position: relative;
        font-size: 8px;
        line-height: 1.5;
        overflow: auto; /* Tambahkan properti overflow pada mode responsif */
    }
}
</style>
@endpush
