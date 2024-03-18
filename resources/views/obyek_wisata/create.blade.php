@extends('adminlte::page')
@section('title', 'Tambah Obyek Wisata')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Obyek Wisata</h1>
@stop
@section('content')
<form action="{{route('obyek_wisata.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="nama_wisata">Nama Wisata</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-book"></i></span>
                        <input type="text" class="form-control border-primary
@error('nama_wisata') is-invalid @enderror" id="nama_wisata" placeholder="Nama Wisata" name="nama_wisata"
                            value="{{old('nama_wisata')}}">
                        @error('nama_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="deskripsi_wisata">Deskripsi Wisata</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                        <textarea type="text" class="form-control border-success"
                            name="deskripsi_wisata">{{old('deskripsi_wisata')}}</textarea>
                        @error('deskripsi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="id_kategori_wisata">Kategori Wisata</label>
                        <div class="input-group">
                            <input type="hidden" name="id_kategori_wisata" id="id_kategori_wisata"
                                value="{{old('id_kategori_wisata')}}">
                            <input type="text" class="form-control border-warning
@error('kategori_wisata') is-invalid @enderror" placeholder="Kategori Wisata" id="kategori_wisata"
                                name="kategori_wisata" value="{{old('kategori_wisata')}}" arialabel="kategori_wisata"
                                aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Kategori Wisata</button>
                        </div>

                        <br>
                        <label for="fasilitas">Fasilitas</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-thumbs-up"></i></span>
                            <input type="text" class="form-control border-info
@error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Fasilitas" name="fasilitas"
                                value="{{old('fasilitas')}}">
                            @error('fasilitas') <span class="textdanger">{{$message}}</span> @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="foto1" class="formlabel">Foto 1</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil1" alt="..."
                                width="15%" id="tampil1">
                            <input class="form-control @error('foto1') isinvalid @enderror border-danger" type="file"
                                id="foto1" name="foto1">
                            @error('foto1') <span class="textdanger">{{$message}}</span> @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="foto2" class="formlabel">Foto 2</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil2" alt="..."
                                width="15%" id="tampil2">
                            <input class="form-control @error('foto2') isinvalid @enderror border-warning" type="file"
                                id="foto2" name="foto2">
                            @error('foto2') <span class="textdanger">{{$message}}</span> @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="foto3" class="formlabel">Foto 3</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil3" alt="..."
                                width="15%" id="tampil3">
                            <input class="form-control @error('foto3') isinvalid @enderror border-success" type="file"
                                id="foto3" name="foto3">
                            @error('foto3') <span class="textdanger">{{$message}}</span> @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="foto4" class="formlabel">Foto 4</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil4" alt="..."
                                width="15%" id="tampil4">
                            <input class="form-control @error('foto4') isinvalid @enderror border-primary" type="file"
                                id="foto4" name="foto4">
                            @error('foto4') <span class="textdanger">{{$message}}</span> @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="foto5" class="formlabel">Foto 5</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil5" alt="..."
                                width="15%" id="tampil5">
                            <input class="form-control @error('foto5') isinvalid @enderror border-danger" type="file"
                                id="foto5" name="foto5">
                            @error('foto5') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
                        <a href="{{route('obyek_wisata.index')}}" class="btn btn-danger">
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
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Kategori Wisata</h1>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered table-stripped border-warning" id="example2">
                            <thead>
                                <tr class="table-warning">
                                    <th class="border-warning">No.</th>
                                    <th class="border-warning">Kategori Wisata</th>
                                    <th class="border-warning">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategori_wisata as $key => $kw)
                                <tr>
                                    <td class="border-warning">{{$key+1}}</td>
                                    <td class="border-warning">{{$kw->kategori_wisata}}</td>
                                    <td class="border-warning">
                                        <button type="button" class="btn btn-warning
                                        btn-xs" onclick="pilih('{{$kw->id}}', '{{$kw->kategori_wisata}}',)" data-bs-dismiss="modal">
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


            function pilih(id, kasta) {
                document.getElementById('id_kategori_wisata').value = id
                document.getElementById('kategori_wisata').value = kasta
            }

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