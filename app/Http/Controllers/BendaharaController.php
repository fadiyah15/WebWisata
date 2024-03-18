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


class BendaharaController extends Controller
{
    public function index()
    {
            $reservasi = Reservasi::all();
            return view('bendahara_reservasi.index', [
                'reservasi' => $reservasi
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
            'status_reservasi_wisata'  => ''
            ]);
            $array = $request->only([
                'id_pelanggan',
                'id_paket',
                'tgl_reservasi_wisata',
                'harga',
                'jumlah_peserta',
                'diskon',
                'nilai_diskon',
                'total_bayar',
                'status_reservasi_wisata'
            ]);
            // $array['file_bukti_tf'] = $request-> file('file_bukti_tf')->store('Bukti Transfer');
            $tambah=Reservasi::create($array);
            // if ($tambah) $request->file('file_bukti_tf')->store('Bukti Transfer');
            return redirect()->route('bendahara_reservasi.index') ->with('success_message', 'Berhasil menambah Reservasi baru');
            
        }

        public function edit($id){
            //Menampilkan Form Edit
            $reservasi = Reservasi::find($id);
            if (!$reservasi) return redirect()->route('bendahara_reservasi.index')->with('error_message', 'reservasi dengan id = ' . $id . ' tidak ditemukan');
            return view('bendahara_reservasi.edit', [
                'reservasi' => $reservasi,
                'pelanggan' => Pelanggan::all(),
                'paket_wisata' => PaketWisata::all()
            ]);
    }
    
    public function update(Request $request, $id) {
            //Menyimpan Data Reservasi
            $request->validate([ 
                'tgl_reservasi_wisata' => 'required',
                'harga' => 'required',
                'jumlah_peserta' => 'required',
                'diskon' => 'required',
                'nilai_diskon' => 'required',
                'total_bayar' => 'required',
                'status_reservasi_wisata'  => 'required'
                ]);


            $reservasi = Reservasi::find($id);
            $reservasi->tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
            $reservasi->harga = $request->harga;
            $reservasi->jumlah_peserta = $request->jumlah_peserta;
            $reservasi->diskon = $request->diskon;
            $reservasi->nilai_diskon = $request->nilai_diskon;
            $reservasi->total_bayar = $request->total_bayar;
            $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;

            $reservasi->save();
            return redirect()->route('bendahara_reservasi.index')->with('success_message', 'Berhasil mengubah Reservasi');
         }


    public function destroy(Request $request, $id) {
        //Menghapus Reservasi
        $reservasi=Reservasi::find($id);

        if ($reservasi) {
            $hapus=$reservasi->delete();
        }

        return redirect()->route('bendahara_reservasi.index') ->with('success_message', 'Berhasil menghapus Reservasi');
    }
}
