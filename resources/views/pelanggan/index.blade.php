@extends('adminlte::page')
@section('title', 'List Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">List Pelanggan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('pelanggan.create')}}" class="btn
                    btn-primary mb-2">
                    <i class="fa fa-plus"> Tambah</i>
                </a>
                <table class="table table-hover table-bordered table-stripped border-info" id="example2">
                    <thead>
                        <tr class="table-info">
                            <th class="border-info">No.</th>
                            <th class="border-info">Id Pelanggan</th>
                            <th class="border-info">Nama Lengkap</th>
                            <th class="border-info">No Telepon</th>
                            <th class="border-info">Alamat</th>
                            <th class="border-info">Foto</th>
                            <th class="border-info">User</th>
                            <th class="border-info">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $key => $pl)
                        <tr>
                            <td class="border-info">{{$key+1}}</td>
                            <td class="border-info">{{$pl->id}}</td>
                            <td class="border-info" id={{$key+1}}>{{$pl->nama_lengkap}}</td>
                            <td class="border-info" id={{$key+1}}>{{$pl->no_hp}}</td>
                            <td class="border-info" id={{$key+1}}>{{$pl->alamat}}</td>
                            <td class="border-info">
                                <img src="storage/{{$pl->foto}}" alt="{{$pl->foto}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td class="border-primary" id={{$key+1}}>{{$pl->fuser->email}}</td>
                            <td class="border-primary">
                                <a href="{{route('pelanggan.edit', $pl)}}" class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"> Edit</i>
                                </a>
                                <a href="{{route('pelanggan.destroy', $pl)}}"
                                    onclick="notificationBeforeDelete(event, this, <?php echo $key+1; ?>)"
                                    class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Delete</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus Data Pelanggan ? \"' + document.getElementById(dt)
                .innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

</script>
@endpush
