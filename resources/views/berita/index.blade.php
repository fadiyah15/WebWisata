@extends('adminlte::page')
@section('title', 'List Berita')
@section('content_header')
<h1 class="m-0 text-dark">List Berita</h1>
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
                                <th class="border-info">Judul</th>
                                <th class="border-info">Berita</th>
                                <th class="border-info">Tanggal Post</th>
                                <th class="border-info">Kategori Berita</th>
                                <th class="border-info foto-column">Foto</th>
                                <th class="border-info">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $key => $br)
                            <tr>
                                <td class="border-info">{{$key+1}}</td>
                                <td class="border-info" id={{$key+1}}>{{$br->judul}}</td>
                                <td class="border-info" id={{$key+1}}>{{$br->berita}}</td>
                                <td class="border-info" id="{{$key+1}}">{{\Carbon\Carbon::parse($br->tgl_post)->format('d-m-y - H:i')}}</td>
                                <td class="border-info" id={{$key+1}}>{{$br->fkata->kategori_berita}}</td>
                                <td class="border-info foto-column">
                                    <img src="{{asset('storage/Foto berita/' . $br->foto)}}" alt="{{$br->foto}} tidak tampil" width="35%"
                                        class="img-thumbnail">
                                </td>
                                <td class="border-primary">
                                    @include('components.action-buttons', ['id' => $br->id, 'key' => $key, 'route' => 'berita'])
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
                <h4 class="modal-title" id="exampleModalLabel">Tambah Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{ route('berita.store') }}" method="POST" id="form" class="form-horizontal"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-server"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul" value="{{old('judul')}}">
                                            @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="berita">Berita</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-newspaper"></i></span>
                                            <textarea type="text" class="form-control border-success" name="berita">{{old('berita')}}</textarea>
                                            @error('berita') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_post">Tanggal Post</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                                            <input type="datetime-local" class="form-control border-warning" class="form-control @error('tgl_post') is-invalid @enderror" id="tgl_post" placeholder="Tanggal Post" name="tgl_post" value="{{old('tgl_post')}}">
                                            @error('tgl_post') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selected_kategoriwisata">Kategori Berita</label>
                                        <div class="input-group">
                                            <input type="hidden" name="id_kategori_berita" id="selected_kategoriwisata_id" value="{{ old('id_kategori_berita') }}">
                                            <input type="text" class="form-control border-success @error('id_kategori_berita') is-invalid @enderror" placeholder="Kategori Berita" id="selected_kategoriwisata" name="selected_kategoriwisata" value="{{ old('selected_kategoriwisata') }}" aria-label="users" aria-describedby="cari" readonly>
                                            <button type="button" class="btn btn-success" data-action="create">Cari Data Kategori Berita</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto" class="formlabel">Foto</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
                                        <input class="form-control @error('foto') isinvalid @enderror border-danger" type="file" id="foto" name="foto">
                                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('berita.index')}}" class="btn btn-danger">Batal</a>
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
@foreach($berita as $key => $br)
<div class="modal fade" id="editModal{{$br->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Data Berita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="{{route('berita.update',$br->id)}}" method="POST" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$br->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-server"></i></span>
                                            <input type="text" class="form-control border-primary
                                            @error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul" value="{{$br->judul ??old('judul')}}">
                                            @error('judul') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="berita">Berita</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-newspaper"></i></span>
                                            <textarea type="text" class="form-control border-success" name="berita">{{$br->berita ??old('berita')}}</textarea>
                                            @error('berita') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_post">Tanggal Post</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                                            <input type="datetime-local" class="form-control border-warning" class="form-control @error('tgl_post') is-invalid @enderror" id="tgl_post" placeholder="Tanggal Post" name="tgl_post" value="{{$br->tgl_post ??old('tgl_post')}}">
                                            @error('tgl_post') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selected_kategoriwisata">Kategori Berita</label>
                                        <div class="input-group">
                                            <input type="hidden" name="id_kategori_berita" id="selected_kategoriwisata_edit_{{$br->id}}" value="{{$br->fkata->id ?? old('id_kategori_berita')}}">
                                            <input type="text" class="form-control border-success @error('id_kategori_berita') is-invalid @enderror" placeholder="Kategori Berita" id="selected_kategoriwisata_{{$br->id}}" name="selected_kategoriwisata" value="{{$br->fkata->kategori_berita ?? old('selected_kategoriwisata')}}" aria-describedby="cari" readonly>
                                            <button type="button" class="btn btn-success" data-action="edit" data-berita-id="{{ $br->id }}">Cari Data Kategori Berita</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto" class="formlabel">Foto</label>
                                        <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
                                        <input class="form-control @error('foto') isinvalid @enderror border-info" type="file" id="foto" name="foto">
                                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{route('berita.index')}}" class="btn btn-danger">Batal</a>
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

<!-- Modal Data Kategori Berita -->
<div class="modal fade" id="KategoriModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>
                        <font color="#000000">Pilih Data Kategori Berita</font>
                    </b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeKategoriModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped border-success" id="example3">
                    <thead>
                        <tr class="table-success">
                            <th class="border-success">No.</th>
                            <th class="border-success">Kategori Berita</th>
                            <th class="border-success">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori_berita as $key => $kr)
                        <tr>
                            <td class="border-success">{{$key+1}}</td>
                            <td class="border-success">{{$kr->kategori_berita}}</td>
                            <td class="border-success">
                                <button type="button" class="btn btn-success
                                btn-xs" onclick="pilih('{{$kr->id}}', '{{$kr->kategori_berita}}',)" data-bs-dismiss="modal">
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

.table .foto-column {
    width: 30%; /* Mencegah kolom terlalu melebar */
    white-space: nowrap; /* Mencegah teks atau konten di dalam kolom dari wrapping */
}

</style>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    $('#example3').DataTable({
        "responsive": true,
    });

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

    function closeKategoriModal() {
        $('#KategoriModal').modal('hide');
    }

    function pilih(kategoriId, kategoriwisata) {
    var action = $('#KategoriModal').data('action');

    if (action === 'edit') {
        // Set input values in the edit modal form
        $('#selected_kategoriwisata_edit_' + $('#KategoriModal').data('berita-id')).val(kategoriId);
        $('#selected_kategoriwisata_' + $('#KategoriModal').data('berita-id')).val(kategoriwisata);
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
    function openKategoriModal(action, beritaId = null) {
        $('#KategoriModal').data('action', action);
        $('#KategoriModal').data('berita-id', beritaId); // Simpan ID karyawan untuk mode edit
        $('#KategoriModal').modal('show');
    }

    // Event handler untuk tombol "Cari Data Users" pada mode edit
    $('[data-action="edit"]').on('click', function() {
        // Dapatkan ID karyawan dari atribut data-karyawan-id pada tombol yang diklik
        var beritaId = $(this).data('berita-id');
        // Panggil fungsi openKategoriModal dengan tindakan edit dan ID karyawan
        openKategoriModal('edit', beritaId);
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
    @foreach($berita as $key => $br)
    $("#editModal{{$br->id}} #foto").change(function () {
        readEditURL(this, '#editModal{{$br->id}} #tampil');
    });

    @endforeach
</script>
@endpush