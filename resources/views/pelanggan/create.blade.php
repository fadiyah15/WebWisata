@extends('adminlte::page')
@section('title', 'Tambah Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <label for="nama_lengkap">Nama Lengkap</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-address-book"></i></span>
                        <input type="text" class="form-control border-primary
@error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap"
                            value="{{old('nama_lengkap')}}">
                        @error('nama_lengkap') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="no_hp">Nomer Telepon</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-phone"></i></span>
                        <input type="number" class="form-control border-warning
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp" value="{{old('no_hp')}}">
                        @error('no_hp') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    
                    <br>
                    <label for="alamat">Alamat</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-home"></i></span>
                        <textarea type="text" class="form-control border-danger"
                            name="alamat">{{old('alamat')}}</textarea>
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="foto" class="formlabel">Foto</label>
                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%"
                            id="tampil">
                        <input class="form-control @error('foto') isinvalid @enderror border-info" type="file" id="foto"
                            name="foto">
                        @error('foto') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="id_user">Users</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control border-success
@error('users') is-invalid @enderror" placeholder="Users" id="users" name="users" value="{{old('users')}}"
                                arialabel="users" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Users</button>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check">
                                Simpan</i></button>
                        <a href="{{route('pelanggan.index')}}" class="btn btn-danger">
                            <i class="fa fa-times"> Batal</i>
                        </a>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            <font color="#007bff">Pencarian Data Users</font>
                        </h1>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Aktif</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->level}}</td>
                                    <td>{{$user->aktif}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary
btn-xs" onclick="pilih('{{$user->id}}', '{{$user->email}}', '{{$user->level}}', )" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        @stop
        @push('js')
        <script>
            $('#example2').DataTable({
                "responsive": true,
            });


            function pilih(id, user) {
                document.getElementById('id_user').value = id
                document.getElementById('users').value = user
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#tampil').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#foto").change(function () {
                readURL(this);
            });

        </script>
        @endpush
