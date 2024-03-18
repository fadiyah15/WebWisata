<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan; 
use App\Models\User;

class ProfilPelangganController extends Controller
{
    public function index(){
        //Menampilkan Profil Pelanggan
        $user = User::findOrFail(Auth::user()->id);
        $pelanggan = Pelanggan::where('id', Auth::user()->id)->first(); 
        return view('profil-pelanggan.index', [
            'pelanggan' => $pelanggan]);
        }


        public function edit($id){
            //Menampilkan Form Edit
            $pelanggan = Pelanggan::find($id);
            if (!$pelanggan) return redirect()->route('profil-pelanggan.index')
            ->with('error_message', 'pelanggan dengan id = ' . $id . ' tidak ditemukan');
            return view('profil-pelanggan.edit', [
                'pelanggan' => $pelanggan,
                'users' => User::all()
            ]);
    }

    public function update(Request $request, $id) {
        //Menyimpan Data Pelanggan
        $request->validate([ 
            'nama_lengkap'=> 'required',
            'no_hp'=> 'required',
            'alamat'=> 'required',
            'foto'=> 'required'
            ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_lengkap = $request->nama_lengkap;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->foto = $request->file('foto')->store('Foto profil');
        $pelanggan->save();
        return redirect()->route('profil-pelanggan.index')->with('success_message', 'Berhasil mengubah Profile Pelanggan');
     }
}