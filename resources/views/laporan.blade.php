@extends('adminlte::page')
@section('title', 'Report Generate')
@section('content_header')
<h1 class="m-0 text-dark">&nbsp; Laporan Reservasi</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <form method="get" action="{{ route('laporan') }}" class="form-inline">
                        <div class="form-group mb-2">
                            <label for="tgl_reservasi_wisata"> Tanggal Awal Reservasi</label> &nbsp; &nbsp;
                            <input type="date" class="form-control border-info @error('tglawal') is-invalid @enderror"
                                id="tglawal" placeholder="Tanggal Reservasi" name="tglawal"
                                value="{{old('tgl_reservasi_wisata')}}"> &nbsp; &nbsp; 
                            
                            <label for="tgl_reservasi_wisata"> Tanggal Akhir Reservasi</label> &nbsp; &nbsp;
                            <input type="date" class="form-control border-info @error('tglakhir') is-invalid @enderror"
                                id="tglakhir" placeholder="Tanggal Reservasi" name="tglakhir"
                                value="{{old('tgl_reservasi_wisata')}}"> &nbsp; &nbsp; 

                        <button type="submit" class="btn btn-info"><i class="fa fa-filter "></i> &nbsp;Filter</button> &nbsp; &nbsp;
                        <a href="{{ route('laporan') }}" class="btn btn-info">
                                    <i class="fa fa-spinner"> Refresh</i></a>
                    </form>
                    </div>


                        <table class="table table-hover table-bordered table-stripped" id="example2">
                            <table class="table	table-hover	table-bordered table-stripped" id="example2">
                                <thead>
                                    <tr class="table-warning">
                                        <th class="border-info">No.</th>
                                        <th class="border-info">Nama Pelanggan</th>
                                        <th class="border-info">Paket Wisata</th>
                                        <th class="border-info">Tanggal Reservasi</th>
                                        <th class="border-info">Harga</th>
                                        <th class="border-info">Jumlah Peserta</th>
                                        <th class="border-info">Diskon</th>
                                        <th class="border-info">Nilai Diskon</th>
                                        <th class="border-info">Total Bayar</th>
                                        <th class="border-info">Status Reservasi</th>
                                        <th class="border-info">Bukti Transfer</th>
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
                                            @if ($rv->status_reservasi_wisata != 'pesan')
                                            <a href="{{asset('storage/Bukti Transfer/' . $rv->file_bukti_tf)}}"
                                                alt="{{$rv->file_bukti_tf}} tidak tampil" class="btn btn-primary"
                                                target="_blank">Lihat Bukti TF</a>
                                            @else
                                                Menunggu Pembayaran
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            $('table:not(#laporan)').DataTable();

            $('#laporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdfHtml5',
                    'print'
                ],
                footer: true
            });
        });

    </script>
</div>

@endsection
