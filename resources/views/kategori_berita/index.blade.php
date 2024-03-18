@extends('adminlte::page')
@section('title', 'List Kategori Berita')
@section('content_header')
<h1 class="m-0 text-dark">List Kategori Berita</h1>
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
                                <th class="border-info">Kategori Berita</th>
                                <th class="border-info">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori_berita as $key => $kb)
                            <tr>
                                <td class="border-info">{{$key+1}}</td>
                                <td class="border-info" id={{$key+1}}>{{$kb->kategori_berita}}</td>
                                <td class="border-info">
                                    @include('components.action-buttons', ['id' => $kb->id, 'key' => $key, 'route' => 'kategori_berita'])
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Kategori Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{ route('kategori_berita.store') }}" method="POST" id="form" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kategori_berita">Kategori Berita</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-database"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('kategori_berita') is-invalid @enderror" id="kategori_berita" placeholder="Kategori Berita" name="kategori_berita" value="{{old('kategori_berita')}}">
                                            @error('kategori_berita') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('kategori_berita.index')}}" class="btn btn-danger">Batal</a>
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
@foreach($kategori_berita as $key => $kb)
<div class="modal fade" id="editModal{{$kb->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Kategori Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{route('kategori_berita.update',$kb->id)}}" method="POST" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$kb->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kategori_berita">Kategori Berita</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-database"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('kategori_berita') is-invalid @enderror" id="kategori_berita" placeholder="Kategori Berita" name="kategori_berita" value="{{$kb->kategori_berita ??old('kategori_berita')}}">
                                            @error('kategori_berita') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('kategori_berita.index')}}" class="btn btn-danger">Batal</a>
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
