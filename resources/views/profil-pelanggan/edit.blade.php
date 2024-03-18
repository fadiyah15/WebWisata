@extends('adminlte::page')
@section('title', 'Edit Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Pelanggan</h1>
@stop
@section('content')
<form action="{{route('profil-pelanggan.update', Auth::user()->pelanggan->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control
@error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap"
                            value="{{$pelanggan->nama_lengkap ??old('nama_lengkap')}}">
                        @error('nama_lengkap') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomer Telepon</label>
                        <input type="number" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp"
                            value="{{$pelanggan->no_hp ??old('no_hp')}}">
                        @error('no_hp') <span class=" text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control"
                            name="alamat">{{$pelanggan->alamat ??old('alamat')}}</textarea>
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto" class="formlabel">Foto</label>
                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%"
                            id="tampil">
                        <input class="form-control @error('foto') isinvalid @enderror border-info" type="file" id="foto"
                            name="foto">
                        @error('foto') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="users">Users</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user"
                                value="{{Auth::user()->email}}">
                            <input type="text" class="form-control @error('users') is-invalid @enderror"
                                placeholder="Id User" id="users" name="users"
                                value="{{Auth::user()->email}}" aria-label="Users"
                                ariadescribedby="cari" readonly>
                            
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('profil-pelanggan.index')}}" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
    $('#example2').DataTable({
        "responsive": true,
    });
    //Fungsi pilih untuk memilih data Kategori wisata dan mengirimkan data kategori wisata dari Modal ke form tambah

    function pilih(id, user) {
        document.getElementById('id_user').value = id
        document.getElementById('users').value = user
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#foto").change(function() {
        readURL(this);
    });
    </script>
    @endpush
