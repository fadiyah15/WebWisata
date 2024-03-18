@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop
@section('content')
<form action="{{route('bendahara_reservasi.update', $reservasi)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pelanggan">Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan"
                                value="{{$reservasi->fplgn->id ??old('id_pelanggan')}}">
                            <input type="text" class="form-control border-primary
@error('pelanggan') is-invalid @enderror" placeholder="Pelanggan" id="pelanggan" name="pelanggan"
                                value="{{$reservasi->fplgn->nama_lengkap ??old('nama_lengkap')}}" arialabel="pelanggan"
                                aria-describedby="cari" readonly>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop"></i>
                                Cari Data Pelanggan</button>
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="id_paket">Paket Wisata</label>
                            <div class="input-group">
                                <input type="hidden" name="id_paket" id="id_paket"
                                    value="{{$reservasi->fpktwsta->idt ??old('id_paket')}}">
                                <input type="text" class="form-control border-warning
@error('paket_wisata') is-invalid @enderror" placeholder="Paket Wisata" id="paket_wisata" name="paket_wisata"
                                    value="{{$reservasi->fpktwsta->nama_paket??old('nama_paket')}}" aria-label="paket_wisata"
                                    aria-describedby="cari" readonly>
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
                                    name="tgl_reservasi_wisata"
                                    value="{{$reservasi->tgl_reservasi_wisata ??old('tgl_reservasi_wisata')}}">
                                @error('tgl_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="harga">Harga</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-dollar">$</i></span>
                                <input type="number" class="form-control border-danger
@error('harga') is-invalid @enderror" id="harga" placeholder="Harga" step="1" name="harga" aria-label="harga"
                                    aria-describedby="cari" value="{{$reservasi->harga ??old('harga')}}" readonly>
                                @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="jumlah_peserta">Jumlah Peserta</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa fa-user-plus"></i></span>
                                <input type="number" class="form-control border-info
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Jumlah Peserta" name="jumlah_peserta"
                                    value="{{$reservasi->jumlah_peserta ??old('jumlah_peserta')}}">
                                @error('jumlah_peserta') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="diskon">Diskon</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-percent"></i></span>
                                <input type="number" class="form-control border-success
@error('diskon') is-invalid @enderror" id="diskon" step="1" min="0" max="100" placeholder="Diskon" aria-label="diskon"
                                    name="diskon" value="{{$reservasi->diskon ??old('diskon')}}" onchange="hitung()">
                                @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="nilai_diskon">Nilai Diskon</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-tag"></i></span>
                                <input type="number" class="form-control border-warning
@error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Nilai Diskon" name="nilai_diskon"
                                    value="{{$reservasi->nilai_diskon ??old('nilai_diskon') }}" onchange="hitung()" readonly>
                                @error('nilai_diskon') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <label for="total_bayar">Total Bayar</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="fa fa-money-bill"></i></span>
                                <input type="number" class="form-control border-danger
@error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Total Bayar" name="total_bayar"
                                    value="{{$reservasi->total_bayar ?? old('total_bayar') }}" onchange="hitung()" readonly>
                                @error('total_bayar') <span class="text-danger">{{$message}}</span> @enderror
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="file_bukti_tf" class="formlabel">File Bukti Transfer</label>
                                @if ($reservasi->file_bukti_tf != null && $reservasi->file_bukti_tf != 'null')
                                    <img src="{{ asset('storage/Bukti Transfer/'.$reservasi->file_bukti_tf) }}" class="img-thumbnail d-block"
                                        width="15%" id="file_bukti_tf" alt="File Bukti Transfer">
                                @else
                                    <img src="{{ asset('img/no-image.png') }}" class="img-thumbnail d-block" alt="No Image"
                                        width="15%">
                                @endif
                                @error('file_bukti_tf')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <label for="exampleInputstatus_reservasi_wisata">Status Reservasi Wisata</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-info-circle"></i></span>
                                <select class="form-select @error('status_reservasi_wisata') isinvalid @enderror border-primary"
                                    id="exampleInputstatus_reservasi_wisata" name="status_reservasi_wisata">
                                    <option value="">choosee..</option>
                                    <option value="pesan" @if($reservasi->status_reservasi_wisata == 'pesan' || old('status_reservasi_wisata')=='pesan' )selected @endif>pesan</option>
                                    <option value="dibayar" @if($reservasi->status_reservasi_wisata == 'dibayar' ||old('status_reservasi_wisata')=='dibayar' )selected @endif>dibayar</option>
                                    <option value="selesai" @if($reservasi->status_reservasi_wisata == 'selesai' ||old('status_reservasi_wisata')=='selesai' )selected @endif>selesai</option>
                                </select>
                                @error('status_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check">
                                        Simpan</i></button>
                                <a href="{{route('bendahara_reservasi.index')}}" class="btn btn-danger">
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
                                <table class="table table-hover table-bordered table-stripped border-info"
                                    id="example2">
                                    <thead>
                                        <tr class="table-info">
                                            <th class="border-info">No.</th>
                                            <th class="border-info">Nama Lengkap</th>
                                            <th class="border-info">No Telepon</th>
                                            <th class="border-info">User</th>
                                            <th class="border-info">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pelanggan as $key => $pln)
                                        <tr>
                                            <td class="border-info">{{$key+1}}</td>
                                            <td class="border-info">{{$pln->nama_lengkap}}</td>
                                            <td class="border-info">{{$pln->no_hp}}</td>
                                            <td class="border-info">{{$pln->fuser->email}}</td>
                                            <td class="border-info">
                                                <button type="button" class="btn btn-info
btn-xs" onclick="pilih('{{$pln->id}}', '{{$pln->nama_lengkap}}', '{{$pln->no_hp}}', '{{$pln->fuser->email}}')"
                                                    data-bs-dismiss="modal">
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
                                                {{$pw->diskon ? $pw->diskon . '%' : '-'}}</td>
                                            <td class="border-warning">
                                                <button type="button" class="btn btn-warning
btn-xs" onclick="pilih1('{{$pw->id}}', '{{$pw->nama_paket}}', '{{$pw->harga_per_pack}}', '{{$pw->diskon}}')"
                                                    data-bs-dismiss="modal">
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
