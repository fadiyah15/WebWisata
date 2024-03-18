@extends('adminlte::page')
@section('title', 'Tambah Karyawan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Karyawan</h1>
@stop
@section('content')
<form action="{{route('karyawan.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="nama_karyawan">Nama karyawan</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-address-book"></i></span>
                        <input type="text" class="form-control border-primary
@error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" placeholder="Nama Karyawan" name="nama_karyawan"
                            value="{{old('nama_karyawan')}}">
                        @error('nama_karyawan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="alamat">Alamat</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-home"></i></span>
                        <textarea type="text" class="form-control border-warning"
                            name="alamat">{{old('alamat')}}</textarea>
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="no_hp">Nomer Telepon</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-phone"></i></span>
                        <input type="number" class="form-control border-success
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp" value="{{old('no_hp')}}">
                        @error('no_hp') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="exampleInputjabatan">Jabatan</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user-plus"></i></span>
                        <select class="form-select @error('jabatan') isinvalid @enderror border-danger"
                            id="exampleInputjabatan" name="jabatan">
                            <option selected>Choose...</option>
                            <option value="administrasi" @if(old('jabatan')=='administrasi' )selected @endif>
                                Administrasi</option>
                            <option value="bendahara" @if(old('jabatan')=='bendahara' )selected @endif>Bendahara
                            </option>
                            <option value="pemilik" @if(old('jabatan')=='pemilik' )selected @endif>Pemilik</option>
                        </select>
                        @error('jabatan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="id_user">Users</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                            <input type="text" class="form-control border-warning
@error('users') is-invalid @enderror" placeholder="Users" id="users" name="users" value="{{old('users')}}"
                                arialabel="users" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Users</button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
                        <a href="{{route('karyawan.index')}}" class="btn btn-danger">
                            <i class="fa fa-times"> Batal</i>
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>
                                <font color="#000000">Pencarian Data Users</font>
                            </b></h1>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped border-warning" id="example2">
                            <thead>
                                <tr class="table-warning">
                                    <th class="border-warning">No.</th>
                                    <th class="border-warning">Email</th>
                                    <th class="border-warning">Level</th>
                                    <th class="border-warning">Aktif</th>
                                    <th class="border-warning">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td class="border-warning">{{$key+1}}</td>
                                    <td class="border-warning">{{$user->email}}</td>
                                    <td class="border-warning">{{$user->level}}</td>
                                    <td class="border-warning">{{$user->aktif}}</td>
                                    <td class="border-warning">
                                        <button type="button" class="btn btn-warning
btn-xs" onclick="pilih('{{$user->id}}', '{{$user->email}}', '{{$user->level}}', )" data-bs-dismiss="modal">
                                            pilih
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
        </script>
        @endpush