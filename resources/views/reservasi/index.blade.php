@extends('adminlte::page')
@section('title', 'List Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">List Reservasi</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <a href="{{route('reservasi.create')}}" class="btn
                    btn-primary mb-2">
                        <i class="fa fa-plus"> Tambah</i>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-stripped border-info" id="example2">
                            <thead>
                                <tr class="table-info">
                                    <th class="border-info">No.</th>
                                    <th class="border-info">Pelanggan</th>
                                    <th class="border-info">Paket Wisata</th>
                                    <th class="border-info">Tanggal Reservasi Wisata</th>
                                    <th class="border-info">Harga</th>
                                    <th class="border-info">Jumlah Peserta</th>
                                    <th class="border-info">Diskon</th>
                                    <th class="border-info">Nilai Diskon</th>
                                    <th class="border-info">Total Bayar</th>
                                    <th class="border-info">Status Reservasi</th>
                                    <th class="border-info">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservasi as $key => $rv)
                                <tr>
                                    <td class="border-info">{{$key+1}}</td>
                                    <td class="border-info" id={{$key+1}}>{{$rv->fplgn->nama_lengkap}}</td>
                                    <td class="border-info" id={{$key+1}}>{{$rv->fpktwsta->nama_paket}}</td>
                                    <td class="border-info" id={{$key+1}}>{{\Carbon\Carbon::parse($rv->tgl_reservasi_wisata)->format('d-m-Y - H:i')}}</td>
                                    <td class="border-info" id={{$key+1}}>Rp {{number_format($rv->harga, 0, ',', '.')}}</td>
                                    <td class="border-info" id={{$key+1}}>{{$rv->jumlah_peserta}}</td>
                                    <td class="border-info" id={{$key+1}}>{{number_format($rv->diskon)}}%</td>
                                    <td class="border-info" id={{$key+1}}>Rp {{number_format($rv->nilai_diskon, 0, ',', '.')}}</td>
                                    <td class="border-info" id={{$key+1}}>Rp {{number_format($rv->total_bayar, 0, ',', '.')}}</td>
                                    <td class="border-info" id={{$key+1}}>{{$rv->status_reservasi_wisata}}</td>
                                    <td class="border-info">
                                    @if ($rv?->file_bukti_tf)
                                        <img src="{{asset('storage/Bukti Transfer/' . $rv->file_bukti_tf)}}" alt="{{$rv->file_bukti_tf}} tidak tampil"
                                            class="img-thumbnail">
                                        @else
                                        <a href="{{route('reservasi.edit', $rv)}}" class="btn btn-primary btn-xs"> Bayar</a>
                                        @endif
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
