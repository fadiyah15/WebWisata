@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Paket Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"> Tambah</i></button>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-stripped border-info" id="example2">
                        <thead>
                            <tr class="table-info">
                                <th class="border-info">No.</th>
                                <th class="border-info">Nama Paket</th>
                                <th class="border-info">Deskripsi</th>
                                <th class="border-info">Fasilitas</th>
                                <!-- <th class="border-info">Harga Per-Pack</th>
                                <th class="border-info">Diskon</th> -->
                                <!-- <th class="border-info">Foto1</th>
                                <th class="border-info">Foto2</th>
                                <th class="border-info">Foto3</th>
                                <th class="border-info">Foto4</th>
                                <th class="border-info">Foto5</th> -->
                                <th class="border-info">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paket_wisata as $key => $pw)
                            <tr>
                                <td class="border-info">{{$key+1}}</td>
                                <td class="border-info" id={{$key+1}}>{{$pw->nama_paket}}</td>
                                <td class="border-info" id={{$key+1}}>{{$pw->deskripsi}}</td>
                                <td class="border-info" id={{$key+1}}>{{$pw->fasilitas}}</td>
                                <!-- <td class="border-info" id={{$key+1}}>Rp {{ number_format($pw->harga_per_pack, 0, ',', '.') }}</td>
                                <td class="border-info" id={{$key+1}}>{{number_format($pw->diskon)}}%</td> -->
                                <!-- <td class="border-info">
                                    <img src="{{asset('storage/Foto paketwisata/' . $pw->foto1)}}" alt="{{$pw->foto1}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto paketwisata/' . $pw->foto2)}}" alt="{{$pw->foto2}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto paketwisata/' . $pw->foto3)}}" alt="{{$pw->foto3}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto paketwisata/' . $pw->foto4)}}" alt="{{$pw->foto4}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto paketwisata/' . $pw->foto5)}}" alt="{{$pw->foto5}} tidak tampil"
                                        class="img-thumbnail">
                                </td> -->
                                <td class="border-info">
                                <div class="btn-group">
                                        <a href="{{ route('paket_wisata' . '.detail', $pw->id) }}"
                                            class="btn btn-info btn-xs">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-xs edit-button mx-1" data-toggle="modal"
                                            data-target="#editModal{{$pw->id}}" data-id="{{$pw->id}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('paket_wisata' . '.destroy', $pw->id) }}"
                                            onclick="notificationBeforeDelete(event, this, {{$key+1}})"
                                            class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Paket Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{ route('paket_wisata.store') }}" method="POST" id="form" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_paket">Nama Paket</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-book"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket" value="{{old('nama_paket')}}">
                                            @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                                            <textarea type="text" class="form-control border-warning" name="deskripsi">{{old('deskripsi')}}</textarea>
                                            @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fasilitas">Fasilitas</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-thumbs-up"></i></span>
                                            <input type="text" class="form-control border-success
                                            @error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Fasilitas" name="fasilitas" value="{{old('fasilitas')}}">
                                            @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_per_pack">Harga Per-Pack</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-dollar">$</i></span>
                                            <input type="integer" class="form-control border-danger
                                            @error('harga_per_pack') is-invalid @enderror" id="harga_per_pack" placeholder="Harga Per-Pack" name="harga_per_pack" value="{{old('harga_per_pack')}}">
                                            @error('harga_per_pack') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="diskon">Diskon</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-percent"></i></span>
                                            <input type="number" class="form-control border-info
                                            @error('diskon') is-invalid @enderror" id="diskon" step="1" min="0" max="100" placeholder="Diskon" name="diskon" value="{{old('diskon')}}">
                                            @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto1" class="formlabel">Foto 1</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil1" alt="..." width="15%" id="tampil1">
                                        <input class="form-control @error('foto1') isinvalid @enderror border-danger" type="file" id="foto1" name="foto1">
                                        @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="foto2" class="formlabel">Foto 2</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil2" alt="..." width="15%" id="tampil2">
                                        <input class="form-control @error('foto2') isinvalid @enderror border-warning" type="file" id="foto2" name="foto2">
                                        @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="foto3" class="formlabel">Foto 3</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil3" alt="..." width="15%" id="tampil3">
                                        <input class="form-control @error('foto3') isinvalid @enderror border-success" type="file" id="foto3" name="foto3">
                                        @error('foto3') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="foto4" class="formlabel">Foto 4</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil4" alt="..." width="15%" id="tampil4">
                                        <input class="form-control @error('foto4') isinvalid @enderror border-primary" type="file" id="foto4" name="foto4">
                                        @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="foto5" class="formlabel">Foto 5</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil5" alt="..." width="15%" id="tampil5">
                                        <input class="form-control @error('foto5') isinvalid @enderror border-danger" type="file" id="foto5" name="foto5">
                                        @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('paket_wisata.index')}}" class="btn btn-danger">Batal</a>
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
@foreach($paket_wisata as $key => $pw)
<div class="modal fade" id="editModal{{$pw->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Paket Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{route('paket_wisata.update',$pw->id)}}" method="POST" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$pw->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_paket">Nama Paket</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-book"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket" value="{{$pw->nama_paket ??old('nama_paket')}}">
                                            @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                                            <textarea type="text" class="form-control border-warning" name="deskripsi">{{$pw->deskripsi ??old('deskripsi')}}</textarea>
                                            @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fasilitas">Fasilitas</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-thumbs-up"></i></span>
                                            <input type="text" class="form-control border-success
                                            @error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Fasilitas" name="fasilitas" value="{{$pw->fasilitas ??old('fasilitas')}}">
                                            @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_per_pack">Harga Per-Pack</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-dollar">$</i></span>
                                            <input type="integer" class="form-control border-danger
                                            @error('harga_per_pack') is-invalid @enderror" id="harga_per_pack" placeholder="Harga Per-Pack" name="harga_per_pack" value="{{$pw->harga_per_pack ??old('harga_per_pack')}}">
                                            @error('harga_per_pack') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="diskon">Diskon</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-percent"></i></span>
                                            <input type="number" class="form-control border-info
                                            @error('diskon') is-invalid @enderror" id="diskon" placeholder="Diskon" name="diskon" value="{{ $pw->diskon ? number_format($pw->diskon, 0, ',', '') : old('diskon') }}" step="1">
                                            @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="foto1" class="formlabel">Foto 1</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil1" alt="..." width="15%" id="tampil1">
                                        <input class="form-control @error('foto1') isinvalid @enderror border-danger" type="file" id="foto1" name="foto1">
                                        @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="foto2" class="formlabel">Foto 2</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil2" alt="..." width="15%" id="tampil2">
                                        <input class="form-control @error('foto2') isinvalid @enderror border-warning" type="file" id="foto2" name="foto2">
                                        @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="foto3" class="formlabel">Foto 3</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil3" alt="..." width="15%" id="tampil3">
                                        <input class="form-control @error('foto3') isinvalid @enderror border-success" type="file" id="foto3" name="foto3">
                                        @error('foto3') <span class="text-danger">{{$message}}</span> @enderror                               
                                    </div>
                                    <div class="form-group">
                                    <label for="foto4" class="formlabel">Foto 4</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil4" alt="..." width="15%" id="tampil4">
                                        <input class="form-control @error('foto4') isinvalid @enderror border-primary" type="file" id="foto4" name="foto4">
                                        @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="foto5" class="formlabel">Foto 5</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil5" alt="..." width="15%" id="tampil5">
                                        <input class="form-control @error('foto5') isinvalid @enderror border-danger" type="file" id="foto5" name="foto5">
                                        @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('paket_wisata.index')}}" class="btn btn-danger">Batal</a>
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

    function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto1").change(function () {
            readURL1(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto2").change(function () {
            readURL2(this);
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto3").change(function () {
            readURL3(this);
        });

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto4").change(function () {
            readURL4(this);
        });

        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#tampil5').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto5").change(function () {
            readURL5(this);
        }); 
</script>
@endpush

@push('js')
<script>
    // Function to handle image preview for edit mode
    function readEditURL(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(previewId).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Iterate over each edit modal and attach change event handlers
    @foreach($paket_wisata as $key => $pw)
    $("#editModal{{$pw->id}} #foto1").change(function () {
        readEditURL(this, '#editModal{{$pw->id}} #tampil1');
    });

    $("#editModal{{$pw->id}} #foto2").change(function () {
        readEditURL(this, '#editModal{{$pw->id}} #tampil2');
    });

    $("#editModal{{$pw->id}} #foto3").change(function () {
        readEditURL(this, '#editModal{{$pw->id}} #tampil3');
    });

    $("#editModal{{$pw->id}} #foto4").change(function () {
        readEditURL(this, '#editModal{{$pw->id}} #tampil4');
    });

    $("#editModal{{$pw->id}} #foto5").change(function () {
        readEditURL(this, '#editModal{{$pw->id}} #tampil5');
    });
    @endforeach
</script>
@endpush