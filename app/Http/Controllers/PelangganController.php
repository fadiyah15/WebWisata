<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\User;

class PelangganController extends Controller
{
    public function index(){
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
        'pelanggan' => $pelanggan
        ]);
        }

        public function create(){
            return view(
                'pelanggan.create', [
                'users' => User::all()
        ]);
        }

        public function store(Request $request) {
            //Menyimpan Data pelanggan
            $request->validate([ 
                'nama_lengkap'=> 'required',
                'no_hp'=> 'required',
                'alamat'=> 'required',
                'foto'=> 'required|image|file|max:2048',
                'id_user' => 'required'
                ]);
            $array=$request->only([ 
                'nama_lengkap',
                'no_hp',
                'alamat',
                'id_user'
                ]);
    
            $array['foto']=$request->file('foto')->store('Foto pelanggan');
            $tambah=Pelanggan::create($array);
            if($tambah) $request->file('foto')->store('Foto pelanggan');
            return redirect()->route('profil-pelanggan.index') ->with('success_message', 'Berhasil menambah Pelanggan baru');
        }

        public function edit($id){
            //Menampilkan Form Edit
            $pelanggan = Pelanggan::find($id);
            if (!$pelanggan) return redirect()->route('pelanggan.index')
            ->with('error_message', 'pelanggan dengan id = ' . $id . ' tidak ditemukan');
            return view('pelanggan.edit', [
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
            $pelanggan->foto = $request->file('foto')->store('Foto pelanggan');
            $pelanggan->id_user = $request->id_user;
            $pelanggan->save();
            return redirect()->route('profil-pelanggan.index')
            ->with('success_message', 'Berhasil mengubah Pelanggan');
         }


    public function destroy(Request $request, $id) {
        //Menghapus Pelanggan
        $pelanggan=Pelanggan::find($id);

        if ($pelanggan) {
            $hapus=$pelanggan->delete();
            if($hapus) unlink("storage/". $pelanggan->foto);
        }

        return redirect()->route('pelanggan.index') ->with('success_message', 'Berhasil menghapus Pelanggan "'. $pelanggan->name . '"!');
    }

}
