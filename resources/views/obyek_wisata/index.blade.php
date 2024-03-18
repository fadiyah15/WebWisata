@extends('adminlte::page')
@section('title', 'List Obyek Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Obyek Wisata</h1>
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
                                <th class="border-info">Nama Wisata</th>
                                <th class="border-info">Deskripsi Wisata</th>
                                <!-- <th class="border-info">Kategori Wisata</th> -->
                                <th class="border-info">Fasilitas</th>
                                <!-- <th class="border-info">Foto1</th>
                                <th class="border-info">Foto2</th>
                                <th class="border-info">Foto3</th>
                                <th class="border-info">Foto4</th>
                                <th class="border-info">Foto5</th> -->
                                <th class="border-info">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($obyek_wisata as $key => $ow)
                            <tr>
                                <td class="border-info">{{$key+1}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ow->nama_wisata}}</td>
                                <td class="border-info" id={{$key+1}}>{{$ow->deskripsi_wisata}}</td>
                                <!-- <td class="border-info" id={{$key+1}}>{{$ow->fkasta->kategori_wisata}}</td> -->
                                <td class="border-info" id={{$key+1}}>{{$ow->fasilitas}}</td>
                                <!-- <td class="border-info">
                                    <img src="{{asset('storage/Foto obyekwisata/' . $ow->foto1)}}" alt="{{$ow->foto1}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto obyekwisata/' . $ow->foto2)}}" alt="{{$ow->foto2}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto obyekwisata/' . $ow->foto3)}}" alt="{{$ow->foto3}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto obyekwisata/' . $ow->foto4)}}" alt="{{$ow->foto4}} tidak tampil"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-info">
                                    <img src="{{asset('storage/Foto obyekwisata/' . $ow->foto5)}}" alt="{{$ow->foto5}} tidak tampil"
                                        class="img-thumbnail">
                                </td> -->
                                <td class="border-info">
                                    <div class="btn-group">
                                        <a href="{{ route('obyek_wisata' . '.detail', $ow->id) }}"
                                            class="btn btn-info btn-xs">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-primary btn-xs edit-button mx-1" data-toggle="modal"
                                            data-target="#editModal{{$ow->id}}" data-id="{{$ow->id}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('obyek_wisata' . '.destroy', $ow->id) }}"
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Obyek Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{ route('obyek_wisata.store') }}" method="POST" id="form" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_wisata">Nama Wisata</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-book"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('nama_wisata') is-invalid @enderror" id="nama_wisata" placeholder="Nama Wisata" name="nama_wisata" value="{{old('nama_wisata')}}">
                                            @error('nama_wisata') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_wisata">Deskripsi Wisata</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                                            <textarea type="text" class="form-control border-warning" name="deskripsi_wisata">{{old('deskripsi_wisata')}}</textarea>
                                            @error('deskripsi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selected_kategoriwisata">Kategori Wisata</label>
                                        <div class="input-group">
                                            <input type="hidden" name="id_kategori_wisata" id="selected_kategoriwisata_id" value="{{ old('id_kategori_wisata') }}">
                                            <input type="text" class="form-control border-primary @error('id_kategori_wisata') is-invalid @enderror" placeholder="Kategori Wisata" id="selected_kategoriwisata" name="selected_kategoriwisata" value="{{ old('selected_kategoriwisata') }}" aria-label="users" aria-describedby="cari" readonly>
                                            <button type="button" class="btn btn-primary" data-action="create">Cari Data Kategori Wisata</button>
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
@foreach($obyek_wisata as $key => $ow)
<div class="modal fade" id="editModal{{$ow->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Obyek Wisata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{route('obyek_wisata.update',$ow->id)}}" method="POST" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$ow->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_wisata">Nama Wisata</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-book"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('nama_wisata') is-invalid @enderror" id="nama_wisata" placeholder="Nama wisata" name="nama_wisata" value="{{$ow->nama_wisata ??old('nama_wisata')}}">
                                            @error('nama_wisata') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi_wisata">Deskripsi Wisata</label>
                                        <div class="input-group flex-nowrap"> 
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-street-view"></i></span>
                                            <textarea type="text" class="form-control border-warning" name="deskripsi_wisata">{{$ow->deskripsi_wisata ??old('deskripsi_wisata')}}</textarea>
                                            @error('deskripsi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selected_kategoriwisata">Kategori Wisata</label>
                                        <div class="input-group">
                                            <input type="hidden" name="id_kategori_wisata" id="selected_kategoriwisata_edit_{{$ow->id}}" value="{{$ow->fkasta->id ?? old('id_kategori_wisata')}}">
                                            <input type="text" class="form-control border-primary @error('id_kategori_wisata') is-invalid @enderror" placeholder="Kategori Wisata" id="selected_kategoriwisata_{{$ow->id}}" name="selected_kategoriwisata" value="{{$ow->fkasta->kategori_wisata ?? old('selected_kategoriwisata')}}" aria-describedby="cari" readonly>
                                            <button type="button" class="btn btn-primary" data-action="edit" data-obyek-id="{{ $ow->id }}">Cari Data Kategori Wisata</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fasilitas">Fasilitas</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-thumbs-up"></i></span>
                                            <input type="text" class="form-control border-success
                                            @error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Fasilitas" name="fasilitas" value="{{$ow->fasilitas ??old('fasilitas')}}">
                                            @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
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
                                        <input class="form-control @error('foto2') isinvalid @enderror border-danger" type="file" id="foto2" name="foto2">
                                        @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                    <label for="foto3" class="formlabel">Foto 3</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil3" alt="..." width="15%" id="tampil3">
                                        <input class="form-control @error('foto3') isinvalid @enderror border-danger" type="file" id="foto3" name="foto3">
                                        @error('foto3') <span class="text-danger">{{$message}}</span> @enderror                               
                                    </div>
                                    <div class="form-group">
                                    <label for="foto4" class="formlabel">Foto 4</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil4" alt="..." width="15%" id="tampil4">
                                        <input class="form-control @error('foto4') isinvalid @enderror border-danger" type="file" id="foto4" name="foto4">
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

<!-- Modal Data Kategori Wisata -->
<div class="modal fade" id="KategoriModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>
                        <font color="#000000">Pilih Data Kategori Wisata</font>
                    </b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeKategoriModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped border-primary" id="example3">
                    <thead>
                        <tr class="table-primary">
                            <th class="border-primary">No.</th>
                            <th class="border-primary">Kategori Wisata</th>
                            <th class="border-primary">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori_wisata as $key => $kw)
                        <tr>
                            <td class="border-primary">{{$key+1}}</td>
                            <td class="border-primary">{{$kw->kategori_wisata}}</td>
                            <td class="border-primary">
                                <button type="button" class="btn btn-primary
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<style>
    .modal-body {
    max-height: 600px; /* Sesuaikan dengan ketinggian maksimum yang diinginkan */
    overflow-y: auto;
}
</style>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    $('#example3').DataTable({
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

        function closeKategoriModal() {
        $('#KategoriModal').modal('hide');
    }

    function pilih(kategoriId, kategoriwisata) {
    var action = $('#KategoriModal').data('action');

    if (action === 'edit') {
        // Set input values in the edit modal form
        $('#selected_kategoriwisata_edit_' + $('#KategoriModal').data('obyek-id')).val(kategoriId);
        $('#selected_kategoriwisata_' + $('#KategoriModal').data('obyek-id')).val(kategoriwisata);
    } else {
        // Set input values in the create modal form
        $('#selected_kategoriwisata_id').val(kategoriId);
        $('#selected_kategoriwisata').val(kategoriwisata);
    }

    // Hide the user modal after selecting a user
    $('#KategoriModal').modal('hide');
}

$(document).ready(function() {
    // Fungsi untuk membuka modal pemilihan pengguna dengan tindakan (edit atau create)
    function openKategoriModal(action, obyekId = null) {
        $('#KategoriModal').data('action', action);
        $('#KategoriModal').data('obyek-id', obyekId); // Simpan ID karyawan untuk mode edit
        $('#KategoriModal').modal('show');
    }

    // Event handler untuk tombol "Cari Data Users" pada mode edit
    $('[data-action="edit"]').on('click', function() {
        // Dapatkan ID karyawan dari atribut data-karyawan-id pada tombol yang diklik
        var obyekId = $(this).data('obyek-id');
        // Panggil fungsi openKategoriModal dengan tindakan edit dan ID karyawan
        openKategoriModal('edit', obyekId);
    });

    // Event handler untuk tombol "Cari Data Users" pada mode create
    $('[data-action="create"]').on('click', function() {
        // Panggil fungsi openKategoriModal dengan tindakan create
        openKategoriModal('create');
    });

    // Fungsi untuk menangani pemilihan pengguna saat menggunakan tombol "pilih"
    $('[data-action="pilih"]').on('click', function() {
        var kategoriId = $(this).data('kategori-id');
        var kategoriwisata = $(this).data('kategoriwisata');
        
        // Panggil fungsi pilih dengan data pengguna yang dipilih
        pilih(kategoriId, kategoriwisata);
    });
});
</script>
@endpush

<!-- Script untuk edit Image -->
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
    @foreach($obyek_wisata as $key => $ow)
    $("#editModal{{$ow->id}} #foto1").change(function () {
        readEditURL(this, '#editModal{{$ow->id}} #tampil1');
    });

    $("#editModal{{$ow->id}} #foto2").change(function () {
        readEditURL(this, '#editModal{{$ow->id}} #tampil2');
    });

    $("#editModal{{$ow->id}} #foto3").change(function () {
        readEditURL(this, '#editModal{{$ow->id}} #tampil3');
    });

    $("#editModal{{$ow->id}} #foto4").change(function () {
        readEditURL(this, '#editModal{{$ow->id}} #tampil4');
    });

    $("#editModal{{$ow->id}} #foto5").change(function () {
        readEditURL(this, '#editModal{{$ow->id}} #tampil5');
    });
    @endforeach
</script>
@endpush
