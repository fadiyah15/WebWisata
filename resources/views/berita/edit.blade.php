@extends('adminlte::page')
@section('title', 'Edit Berita')
@section('content_header')
<h1 class="m-0 text-dark">Edit Berita</h1>
@stop
@section('content')
<form action="{{route('berita.update', $berita)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="judul">Judul</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-server"></i></span>
                        <input type="text" class="form-control border-primary
@error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul"
                            value="{{$berita->judul ??old('judul')}}">
                        @error('judul') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="berita">Berita</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-newspaper"></i></span>
                        <textarea type="text" class="form-control border-success"
                            name="berita">{{$berita->berita ??old('berita')}}</textarea>
                        @error('berita') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <label for="tgl_post">Tanggal Post</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                        <input type="date" class="form-control border-warning"
                            class="form-control @error('tgl_post') is-invalid @enderror" id="tgl_post"
                            placeholder="Tanggal Post" name="tgl_post" value="{{$berita->tgl_post ??old('tgl_post')}}">
                        @error('tgl_post') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="id_kategori_berita">Kategori Berita</label>
                        <div class="input-group">
                            <input type="hidden" name="id_kategori_berita" id="id_kategori_berita"
                                value="{{old('id_kategori_berita')}}">
                            <input type="text" class="form-control border-danger
@error('kategori_berita') is-invalid @enderror" placeholder="Kategori berita" id="kategori_berita"
                                name="kategori_berita" value="{{$berita->kategori_berita ??old('kategori_berita')}}"
                                arialabel="kategori_berita" aria-describedby="cari" readonly>
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Kategori Berita</button>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="foto" class="formlabel">Foto</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..."
                                width="15%" id="tampil">
                            <input class="form-control @error('foto') isinvalid @enderror border-info" type="file" id="foto"
                                name="foto">
                            @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
                            <a href="{{route('berita.index')}}" class="btn btn-danger">
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
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                <font color="#007bff">Pencarian Data Kategori Berita</font>
                            </h1>
                            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered tablestripped border-danger" id="example2">
                                <thead>
                                    <tr class="table-danger">
                                        <th class="border-danger">No.</th>
                                        <th class="border-danger">Kategori Berita</th>
                                        <th class="border-danger">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori_berita as $key => $kr)
                                    <tr>
                                        <td class="border-danger">{{$key+1}}</td>
                                        <td class="border-danger">{{$kr->kategori_berita}}</td>
                                        <td class="border-danger">
                                            <button type="button" class="btn btn-danger
btn-xs" onclick="pilih('{{$kr->id}}', '{{$kr->kategori_berita}}',)" data-bs-dismiss="modal">
                                                pilih &nbsp;<i class="fa fa-mouse-pointer"></i>
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


                function pilih(id, kata) {
                    document.getElementById('id_kategori_berita').value = id
                    document.getElementById('kategori_berita').value = kata
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