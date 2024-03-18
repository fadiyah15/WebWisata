@extends('adminlte::page')
@section('title', 'Tambah Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pelanggan">Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{$reservasi->fplgn->id ??old('id_pelanggan')}}">
                            <input type="text" class="form-control border-primary
@error('pelanggan') is-invalid @enderror" placeholder="Pelanggan" id="pelanggan" name="pelanggan"
                                value="{{$reservasi->fplgn->nama_lengkap ??old('nama_lengkap')}}" arialabel="pelanggan" aria-describedby="cari" readonly>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Pelanggan</button>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="id_paket">Paket Wisata</label>
                            <div class="input-group">
                                <input type="hidden" name="id_paket" id="id_paket" value="{{$reservasi->fpktwsta->id ??old('id_paket')}}">
                                <input type="text" class="form-control border-warning
@error('paket_wisata') is-invalid @enderror" placeholder="Paket Wisata" id="paket_wisata" name="paket_wisata"
                                    value="{{$reservasi->fpktwsta->nama_paket ??old('nama_paket')}}" aria-label="paket_wisata" aria-describedby="cari"
                                    readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop1"></i>
                                    Cari Data Paket Wisata</button>
                            </div>

                            <br>
                            <label for="tgl_reservasi_wisata">Tanggal Reservasi Wisata</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                                <input type="datetime-local" class="form-control border-success
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal Reservasi Wisata"
                                    name="tgl_reservasi_wisata" value="{{old('tgl_reservasi_wisata')}}">
                                @error('tgl_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="harga">Harga</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-dollar">$</i></span>
                                <input type="number" class="form-control border-danger
@error('harga') is-invalid @enderror" id="harga" placeholder="Harga" step="1" name="harga" aria-label="harga"
                                    aria-describedby="cari"
                                    value="{{ number_format((float) old('harga'), 0, ',', '.')}}" readonly>
                                @error('harga') <span class="textdanger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="jumlah_peserta">Jumlah Peserta</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa fa-user-plus"></i></span>
                                <input type="number" class="form-control border-info
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Jumlah Peserta" name="jumlah_peserta"
                                    value="{{old('jumlah_peserta')}}" onchange="hitung()">
                                @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="diskon">Diskon</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-percent"></i></span>
                                <input type="number" class="form-control border-success
@error('diskon') is-invalid @enderror" id="diskon" step="1" min="0" max="100" placeholder="Diskon" aria-label="diskon"
                                    name="diskon" value="{{old('diskon')}}" onchange="hitung()">
                                @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="nilai_diskon">Nilai Diskon</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-tag"></i></span>
                                <input type="number" class="form-control border-warning
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Nilai Diskon" name="nilai_diskon"
                                    value="{{ old('nilai_diskon') }}" readonly onchange="hitung()">
                                @error('nilai_diskon') <span class="textdanger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="total_bayar">Total Bayar</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa fa-money-bill"></i></span>
                                <input type="number" class="form-control border-danger
@error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Total Bayar" name="total_bayar"
                                    value="{{ old('total_bayar') }}"
                                    readonly onchange="hitung()">
                                @error('total_bayar') <span class="textdanger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="file_bukti_tf" class="formlabel">File Bukti Transfer</label>
                                <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..."
                                    width="15%" id="tampil">
                                <input type="file" class="form-control border-success
@error('file_bukti_tf') is-invalid @enderror" id="file_bukti_tf" placeholder="File Bukti Transfer" name="file_bukti_tf"
                                    value="{{old('file_bukti_tf')}}">
                                @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                            </div>
                            <br>
                            <label for="exampleInputstatus_reservasi_wisata">Status Reservasi Wisata</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa fa-info-circle"></i></span>
                                <select
                                    class="form-select @error('status_reservasi_wisata') isinvalid @enderror border-primary"
                                    id="exampleInputstatus_reservasi_wisata" name="status_reservasi_wisata">
                                    <option value="pesan" @if(old('status_reservasi_wisata')=='pesan' )selected @endif>
                                        Pesan</option>
                                </select>
                                @error('status_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check">
                                        Simpan</i></button>
                                <a href="{{route('reservasi.index')}}" class="btn btn-danger">
                                    <i class="fa fa-times"> Batal</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                    <font color="#000000">Pencarian Data Pelanggan</font>
                                </h1>
                                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover table-bordered table-stripped border-primary"
                                    id="example2">
                                    <thead>
                                        <tr class="table-primary">
                                            <th class="border-primary">No.</th>
                                            <th class="border-primary">Nama Lengkap</th>
                                            <th class="border-primary">No Telepon</th>
                                            <th class="border-primary">User</th>
                                            <th class="border-primary">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pelanggan as $key => $pln)
                                        <tr>
                                            <td class="border-primary">{{$key+1}}</td>
                                            <td class="border-primary">{{$pln->nama_lengkap}}</td>
                                            <td class="border-primary">{{$pln->no_hp}}</td>
                                            <td class="border-primary">{{$pln->fuser->email}}</td>
                                            <td class="border-primary">
                                                <button type="button" class="btn btn-primary
                                                btn-xs" onclick="pilih('{{$pln->id}}', '{{$pln->nama_lengkap}}', '{{$pln->no_hp}}', '{{$pln->fuser->email}}')" data-bs-dismiss="modal">
                                                    pilih
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

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                    <font color="#000000">Pencarian Data Paket Wisata</font>
                                </h1>
                                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover table-bordered table-stripped border-warning"
                                    id="example3">
                                    <thead>
                                        <tr class="table-warning">
                                            <th class="border-warning">No.</th>
                                            <th class="border-warning">Nama Paket</th>
                                            <th class="border-warning">Harga</th>
                                            <th class="border-warning">Diskon</th>
                                            <th class="border-warning">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paket_wisata as $key => $pw)
                                        <tr>
                                            <td class="border-warning">{{$key+1}}</td>
                                            <td class="border-warning" id={{$key+1}}>{{$pw->nama_paket}}</td>
                                            <td class="border-warning" id={{$key+1}}>
                                                {{'Rp' . number_format($pw->harga_per_pack, 0, ',', '.')}}</td>
                                            <td class="border-warning" id={{$key+1}}>
                                                {{ $pw->diskon ? number_format($pw->diskon, 0) . '%' : '-' }}</td>
                                            <td class="border-warning">
                                                <button type="button" class="btn btn-warning
                                                btn-xs" onclick="pilih1('{{$pw->id}}', '{{$pw->nama_paket}}', '{{$pw->harga_per_pack}}', '{{$pw->diskon}}')" data-bs-dismiss="modal">
                                                    pilih
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
