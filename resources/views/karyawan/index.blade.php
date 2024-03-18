@extends('adminlte::page')
@section('title', 'List Karyawan')
@section('content_header')
<h1 class="m-0 text-dark">List Karyawan</h1>
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
                                <th class="border-info">Nama Karyawan</th>
                                <th class="border-info">Alamat</th>
                                <th class="border-info">No. Telepon</th>
                                <th class="border-info">Jabatan</th>
                                <th class="border-info">Email</th>
                                <th class="border-info">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawan as $key => $ky)
                            <tr>
                                <td class="border-info">{{$key+1}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ky->nama_karyawan}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ky->alamat}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ky->no_hp}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ky->jabatan}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ky->fuser->email}}</td>
                                <td class="border-info">
                                    @include('components.action-buttons', ['id' => $ky->id, 'key' => $key, 'route' => 'karyawan'])
                                </td>
                            </tr>
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{ route('karyawan.store') }}" method="POST" id="form" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_karyawan">Nama karyawan</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-address-book"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" placeholder="Nama Karyawan" name="nama_karyawan" value="{{old('nama_karyawan')}}">
                                            @error('nama_karyawan') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-home"></i></span>
                                            <textarea type="text" class="form-control border-warning" name="alamat">{{old('alamat')}}</textarea>
                                            @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Nomer Telepon</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-phone"></i></span>
                                            <input type="number" class="form-control border-success
                                            @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp" value="{{old('no_hp')}}">
                                            @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputjabatan">Jabatan</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user-plus"></i></span>
                                            <select class="form-select @error('jabatan') isinvalid @enderror border-danger"
                                                id="exampleInputjabatan" name="jabatan">
                                                <option selected>Choose...</option>
                                                <option value="administrasi" @if(old('jabatan')=='administrasi' )selected @endif>Administrasi</option>
                                                <option value="bendahara" @if(old('jabatan')=='bendahara' )selected @endif>Bendahara</option>
                                                <option value="pemilik" @if(old('jabatan')=='pemilik' )selected @endif>Pemilik</option>
                                            </select>
                                            @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selected_user">Users</label>
                                        <div class="input-group">
                                            <input type="hidden" name="id_user" id="selected_user_id" value="{{ old('id_user') }}">
                                            <input type="text" class="form-control border-warning @error('id_user') is-invalid @enderror" placeholder="Users" id="selected_user" name="selected_user" value="{{ old('selected_user') }}" aria-label="users" aria-describedby="cari" readonly>
                                            <button type="button" class="btn btn-warning" data-action="create">Cari Data Users</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('karyawan.index')}}" class="btn btn-danger">Batal</a>
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
<!-- End Modal -->

<!-- Modal Edit -->
@foreach($karyawan as $key => $ky)
<div class="modal fade" id="editModal{{$ky->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{route('karyawan.update',$ky->id)}}" method="POST" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$ky->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_karyawan">Nama karyawan</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-address-book"></i></span>
                                                <input type="text" class="form-control border-primary
                                                @error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" placeholder="Nama Karyawan" name="nama_karyawan" value="{{$ky->nama_karyawan ?? old('nama_karyawan')}}">
                                                @error('nama_karyawan') <span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-home"></i></span>
                                                <textarea type="text" class="form-control border-warning" name="alamat">{{$ky->alamat ??old('alamat')}}</textarea>
                                                @error('alamat')<span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">Nomer Telepon</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-phone"></i></span>
                                                <input type="number" class="form-control border-success
                                                @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp" value="{{$ky->no_hp ??old('no_hp')}}">
                                                @error('no_hp') <span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjabatan">Jabatan</label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user-plus"></i></span>
                                                <select class="form-select @error('jabatan') isinvalid @enderror border-danger" id="exampleInputjabatan" name="jabatan">
                                                    <option value="administrasi" @if($ky->jabatan == 'administrasi' || old('jabatan')=='administrasi' )selected @endif>Administrasi</option>
                                                    <option value="bendahara" @if($ky->jabatan == 'bendahara' || old('jabatan')=='bendahara' )selected @endif>Bendahara</option>
                                                    <option value="pemilik" @if($ky->jabatan == 'pemilik' || old('jabatan')=='pemilik')selected @endif>Pemilik</option>
                                                </select>
                                                @error('jabatan') <span class="text-danger">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="selected_user">Users</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id_user" id="selected_user_edit_{{$ky->id}}" value="{{$ky->fuser->id ?? old('id_user')}}">
                                                <input type="text" class="form-control border-warning @error('id_user') is-invalid @enderror" placeholder="Users" id="selected_user_{{$ky->id}}" name="selected_user" value="{{$ky->fuser->email ?? old('selected_user')}}" aria-label="users" aria-describedby="cari" readonly>
                                                <button type="button" class="btn btn-warning" data-action="edit" data-karyawan-id="{{ $ky->id }}">Cari Data Users</button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{route('karyawan.index')}}" class="btn btn-danger">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach  
<!-- End Modal -->

<!-- Modal Data Users -->
<div class="modal fade" id="userModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>
                        <font color="#000000">Pilih Data Users</font>
                    </b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeUserModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped border-warning" id="example3">
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
                                <button type="button" class="btn btn-warning btn-xs" data-action="pilih" data-user-id="{{$user->id}}" data-user-email="{{$user->email}}" data-user-level="{{$user->level}}" data-bs-dismiss="modal">
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    $('#example3').DataTable({
        "responsive": true,
    });


    function closeUserModal() {
        $('#userModal').modal('hide');
    }

    function pilih(userId, userEmail, userLevel) {
    var action = $('#userModal').data('action');

    if (action === 'edit') {
        // Set input values in the edit modal form
        $('#selected_user_edit_' + $('#userModal').data('karyawan-id')).val(userId);
        $('#selected_user_' + $('#userModal').data('karyawan-id')).val(userEmail);
    } else {
        // Set input values in the create modal form
        $('#selected_user_id').val(userId);
        $('#selected_user').val(userEmail);
    }

    // Hide the user modal after selecting a user
    $('#userModal').modal('hide');
}

$(document).ready(function() {
    // Fungsi untuk membuka modal pemilihan pengguna dengan tindakan (edit atau create)
    function openUserModal(action, karyawanId = null) {
        $('#userModal').data('action', action);
        $('#userModal').data('karyawan-id', karyawanId); // Simpan ID karyawan untuk mode edit
        $('#userModal').modal('show');
    }

    // Event handler untuk tombol "Cari Data Users" pada mode edit
    $('[data-action="edit"]').on('click', function() {
        // Dapatkan ID karyawan dari atribut data-karyawan-id pada tombol yang diklik
        var karyawanId = $(this).data('karyawan-id');
        // Panggil fungsi openUserModal dengan tindakan edit dan ID karyawan
        openUserModal('edit', karyawanId);
    });

    // Event handler untuk tombol "Cari Data Users" pada mode create
    $('[data-action="create"]').on('click', function() {
        // Panggil fungsi openUserModal dengan tindakan create
        openUserModal('create');
    });

    // Fungsi untuk menangani pemilihan pengguna saat menggunakan tombol "pilih"
    $('[data-action="pilih"]').on('click', function() {
        var userId = $(this).data('user-id');
        var userEmail = $(this).data('user-email');
        var userLevel = $(this).data('user-level');
        
        // Panggil fungsi pilih dengan data pengguna yang dipilih
        pilih(userId, userEmail, userLevel);
    });
});
</script>
@endpush
