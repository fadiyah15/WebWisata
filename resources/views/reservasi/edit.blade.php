@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.update', $reservasi)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                            <div class="form-group">
                            <div class="form-group">
                            <label for="file_bukti_tf" class="formlabel">File Bukti Transfer</label>
                            <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..."
                                width="15%" id="tampil">
                            <input class="form-control @error('file_bukti_tf') isinvalid @enderror border-danger" type="file"
                                id="file_bukti_tf" name="file_bukti_tf">
                            @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check">
                                        Simpan</i></button>
                                <a href="{{route('reservasi.index')}}" class="btn btn-danger">
                                    <i class="fa fa-times"> Batal</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @stop
                @push('js')

                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#tampil').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $('#example2').DataTable({
                        "responsive": true
                    });

                    function pilih(id, pelanggan) {
                        document.getElementById('id_pelanggan').value = id
                        document.getElementById('pelanggan').value = pelanggan
                    }

                    $('#example3').DataTable({
                        "responsive": true
                    });

                    function pilih1(id, pktwsta, harga, diskon) {
                        document.getElementById('id_paket').value = id
                        document.getElementById('paket_wisata').value = pktwsta;
                        document.getElementById('harga').value = harga;
                        document.getElementById('diskon').value = diskon;
                    }

                    $("#file_bukti_tf").change(function () {
                        readURL(this);
                    });

                    function hitung() {
                        let harga = document.getElementById("harga").value;
                        let diskon = document.getElementById("diskon").value;
                        let jumlah = document.getElementById("jumlah_peserta").value;
                        let nilai_diskon = (harga) * diskon / 100
                        let nilaidiskon = document.getElementById("nilai_diskon").value = nilai_diskon;
                        let total_bayar = document.getElementById("total_bayar");
                        total_bayar.value = (harga - nilai_diskon) * jumlah;
                    }

                </script>
                @endpush
