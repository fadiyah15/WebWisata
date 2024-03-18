@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
<h1 class="m-0 text-dark">List User</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"> Tambah</i></button>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped border-info" id="example2">
                        <thead>
                            <tr class="table-info">
                                <th class="border-info">No.</th>
                                <th class="border-info">Email</th>
                                <th class="border-info">Level</th>
                                <th class="border-info">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>
                                <td class="border-info">{{$key+1}}</td>
                                <td class="border-info">{{$user->email}}</td>
                                <td class="border-info">{{$user->level}}</td>
                                <td class="border-info">
                                    @include('components.action-buttons', ['id' => $user->id, 'key' => $key, 'route' => 'users'])
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{$user->id}}" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Data User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body form">
                                        <form action="{{route('users.update',$user->id)}}" method="POST" id="form" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword">Email Address</label>
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"></i></span>
                                                                    <input type="email" class="form-control border-primary
                                                                    @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$user->email ?? old('email')}}">
                                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword">Password</label>
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
                                                                    <input type="password" class="form-control border-warning
                                                                    @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                                                                    @error('password')<span class="text-danger">{{$message}}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword">Konfirmasi Password</label>
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-unlock-alt"></i></span>
                                                                    <input type="password" class="form-control border-success" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputlevel">Level</label>
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-random"></i></span>
                                                                    <select class="form-select @error('level') is-invalid @enderror border-danger" id="exampleInputlevel" name="level">
                                                                        <option value="admin" @if($user->level == 'admin' || old('level') == 'admin')selected @endif>Admin</option>
                                                                        <option value="bendahara" @if($user->level == 'bendahara' || old('level') == 'bendahara')selected @endif>Bendahara</option>
                                                                        <option value="pelanggan" @if($user->level == 'pelanggan' || old('level') == 'pelanggan')selected @endif>Pelanggan</option>
                                                                        <option value="pemilik" @if($user->level == 'pemilik' || old('level') == 'pemilik')selected @endif>Pemilik</option>
                                                                    </select>
                                                                    @error('level') <span class="text-danger">{{$message}}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputAktif">Aktif</label>
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-circle"></i></span>
                                                                    <select class="form-select @error('aktif') isinvalid @enderror border-warning" id="exampleInputAktif" name="aktif">
                                                                        <option value="1" @if($user->aktif == '1' || old('aktif') == '1')selected @endif>Ya</option>
                                                                        <option value="0" @if($user->aktif == '0' || old('aktif') == '0')selected @endif>Tidak</option>
                                                                    </select>
                                                                    @error('level') <span class="text-danger">{{$message}}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                <a href="{{route('users.index')}}" class="btn btn-danger">Batal</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{ route('users.store') }}" method="POST" id="form" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Email Address</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control border-primary
                                            @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Password</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control border-warning
                                            @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                                            @error('password')<span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Konfirmasi Password</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-unlock-alt"></i></span>
                                            <input type="password" class="form-control border-success" id="exampleInputPassword" placeholder="Konfirmasi Password" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputlevel">Level</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-random"></i></span>
                                            <select class="form-select @error('level') is-invalid @enderror border-danger" id="exampleInputlevel" name="level">
                                                <option selected>Choose...</option>
                                                <option value="admin" @if(old('level')=='admin' )selected @endif>Admin</option>
                                                <option value="bendahara" @if(old('level')=='bendahara' )selected @endif>Bendahara</option>
                                                <option value="pelanggan" @if(old('level')=='pelanggan' )selected @endif>Pelanggan</option>
                                                <option value="pemilik" @if(old('level')=='pemilik' )selected @endif>Pemilik</option>
                                            </select>
                                            @error('level') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('users.index')}}" class="btn btn-danger">Batal</a>
                                    </div>
                                </form>
                             </div>
                        </div>
                    </div>
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
@endpush
