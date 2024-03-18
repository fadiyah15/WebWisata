<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    public function index(){
        if(Auth::user()->level == 'pelanggan'){
            $reservasi = Reservasi::where('id_pelanggan', Auth::user()->pelanggan?->id)->get();
        }else{
            $reservasi = Reservasi::all();
        }
        return view('reservasi.index', compact('reservasi'));
        }

        public function create(){
            return view(
                'reservasi.create', [
                'pelanggan' => Pelanggan::all(),
                'paket_wisata' => PaketWisata::all()
        ]);
        }

        public function store(Request $request){
            //Menyimpan Data Reservasi
            $request->validate([
            'id_pelanggan' => 'required',
            'id_paket' => 'required',
            'tgl_reservasi_wisata' => 'required',
            'harga' => 'required',
            'jumlah_peserta' => 'required',
            'diskon' => 'required',
            'nilai_diskon' => '', 
            'total_bayar' =>  '',
            'file_bukti_tf' => 'nullable',
            'status_reservasi_wisata'  => ''
            ]);

            $reservasi = new Reservasi();
            if($request->hasfile('file_bukti_tf')) {
                $file = $request->file('file_bukti_tf');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Bukti Transfer', $fileName, 'public');

                $reservasi->file_bukti_tf = $fileName;
            }

            $reservasi->id_pelanggan = $request->id_pelanggan;
            $reservasi->id_paket = $request->id_paket;
            $reservasi->tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
            $reservasi->harga = $request->harga;
            $reservasi->jumlah_peserta = $request->jumlah_peserta;
            $reservasi->diskon = $request->diskon;
            $reservasi->nilai_diskon = $request->nilai_diskon;
            $reservasi->total_bayar = $request->total_bayar;
            $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;

            $reservasi->save();
            return redirect()->route('reservasi.index') ->with('success_message', 'Berhasil menambah Reservasi baru');
            
        }

        public function edit($id){
            //Menampilkan Form Edit
            $reservasi = Reservasi::find($id);
            if (!$reservasi) return redirect()->route('reservasi.index')->with('error_message', 'reservasi dengan id = ' . $id . ' tidak ditemukan');
            return view('reservasi.edit', [
                'reservasi' => $reservasi,
                'pelanggan' => Pelanggan::all(),
                'paket_wisata' => PaketWisata::all()
            ]);
    }
    
    public function update(Request $request, $id) {
            //Menyimpan Data Pelanggan
            $request->validate([ 
                
                'file_bukti_tf'=> 'required',
                
                ]);

            $reservasi = Reservasi::find($id);
            if($request->hasfile('file_bukti_tf')) {
                $file = $request->file('file_bukti_tf');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Bukti Transfer', $fileName, 'public');

                $reservasi->file_bukti_tf = $fileName;
            }
            
            $reservasi->save();
            return redirect()->route('reservasi.index')->with('success_message', 'Berhasil mengubah Reservasi');
         }


    public function destroy(Request $request, $id) {
        //Menghapus Reservasi
        $reservasi=Reservasi::find($id);

        if ($reservasi) {
            $hapus=$reservasi->delete();
        }

        return redirect()->route('reservasi.index') ->with('success_message', 'Berhasil menghapus Reservasi');
    }

    public function downloadpdf($tglawal, $tglakhir) {
        $reservasi = Reservasi::whereBetween('tgl_reservasi_wisata', [$tglawal, $tglakhir])->get();
        $pdf = PDF::loadView('laporan-pdf', compact('reservasi', 'tglawal', 'tglakhir'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('laporan-pdf');
    }

    public function laporan(Request $request)
    {
        $tglawal = $request->input('tglawal');
        $tglakhir = date('Y-m-d', strtotime($request->input('tglakhir') . ' +1 day'));
        $reservasi = Reservasi::whereBetween('tgl_reservasi_wisata', [$tglawal, $tglakhir])->get();

        return view('laporan', compact('reservasi', 'tglawal', 'tglakhir'));
    }

    // public function cetakreservasipertanggal(Request $request)
    // {
    //     $tglawal = $request->input('tglawal');
    //     $tglakhir = date('Y-m-d', strtotime($request->input('tglakhir') . ' +1 day'));
    //     $reservasi = Reservasi::whereBetween('tgl_reservasi_wisata', [$tglawal, $tglakhir])->get();

    //     return view('laporan', compact('reservasi', 'tglawal', 'tglakhir'));
    // }

    
    // public function cetaklaporan(Request $request)
    // {
    //     $tglawal = $request->input('tglawal');
    //     $tglakhir = $request->input('tglakhir');
    //     $reservasi = Reservasi::whereBetween('tgl_reservasi_wisata', [$tglawal, $tglakhir])->get();

    //     $pdf = PDF::loadView('laporan-pdf', compact('reservasi', 'tglawal', 'tglakhir'));
    //     return $pdf->download('laporan.pdf');
    // }
}
