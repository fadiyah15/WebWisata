<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PaketWisataController extends Controller
{
    public function index(){
        $paket_wisata = PaketWisata::all();
        return view('paket_wisata.index', [
        'paket_wisata' => $paket_wisata
        ]);
        }

        public function store(Request $request) {
            //Menyimpan Data paket_wisata
            $request->validate([ 
                'nama_paket'=> 'required|unique:paket_wisata,nama_paket',
                'deskripsi'=> 'required',
                'fasilitas'=> 'required',
                'harga_per_pack'=> 'required',
                'diskon' => 'required',
                'foto1'=> 'required|image|file|max:2048',
                'foto2'=> 'required|image|file|max:2048',
                'foto3'=> 'required|image|file|max:2048',
                'foto4'=> 'required|image|file|max:2048',
                'foto5'=> 'required|image|file|max:2048'
                ]);

            $paket_wisata = new PaketWisata();
            if($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto1 = $fileName;
            }

            if($request->hasfile('foto2')) {
                $file = $request->file('foto2');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto2 = $fileName;
            }

            if($request->hasfile('foto3')) {
                $file = $request->file('foto3');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto3 = $fileName;
            }

            if($request->hasfile('foto4')) {
                $file = $request->file('foto4');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto4 = $fileName;
            }

            if($request->hasfile('foto5')) {
                $file = $request->file('foto5');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto5 = $fileName;
            }

            $paket_wisata->nama_paket = $request->nama_paket;
            $paket_wisata->deskripsi = $request->deskripsi;
            $paket_wisata->fasilitas = $request->fasilitas;
            $paket_wisata->harga_per_pack = $request->harga_per_pack;
            $paket_wisata->diskon = $request->diskon;

            $paket_wisata->save();
            return redirect()->route('paket_wisata.index') ->with('success_message', 'Berhasil menambah Paket Wisata baru');
        }

        public function detail(Request $request, $id)
        {
            $paket_wisata = PaketWisata::findOrFail($id);    
            return view('paket_wisata.detail', [
                'paket_wisata' => $paket_wisata,
            ]);
        }
    
        // public function edit($id){
        //     //Menampilkan Form Edit
        //     $paket_wisata = PaketWisata::find($id);
        //     if (!$paket_wisata) return redirect()->route('paket_wisata.index')
        //     ->with('error_message', 'paket_wisata dengan id = ' . $id . ' tidak ditemukan');
        //     return view('paket_wisata.edit', [
        //         'paket_wisata' => $paket_wisata,
        //     ]);
        // }

        public function update(Request $request, $id) {
            //Menyimpan Data paket_wisata
            $request->validate([ 
                'nama_paket'=> 'required',
                'deskripsi'=> 'required',
                'fasilitas'=> 'required',
                'harga_per_pack'=> 'required',
                'diskon'=> 'required',
                'foto1'=> 'required',
                'foto2'=> 'required',
                'foto3'=> 'required',
                'foto4'=> 'required',
                'foto5'=> 'required'
            ]);

            $paket_wisata = PaketWisata::find($id);

            if (! $paket_wisata) {
                return redirect()->back()->with('error_message', 'Data tidak ditemukan');
            }

            $paket_wisata->nama_paket = $request->nama_paket;
            $paket_wisata->deskripsi = $request->deskripsi;
            $paket_wisata->fasilitas = $request->fasilitas;
            $paket_wisata->harga_per_pack = $request->harga_per_pack;
            $paket_wisata->diskon = $request->diskon;

            if($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto1 = $fileName;
            }

            if($request->hasfile('foto2')) {
                $file = $request->file('foto2');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto2 = $fileName;
            }

            if($request->hasfile('foto3')) {
                $file = $request->file('foto3');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto3 = $fileName;
            }

            if($request->hasfile('foto4')) {
                $file = $request->file('foto4');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto4 = $fileName;
            }

            if($request->hasfile('foto5')) {
                $file = $request->file('foto5');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto paketwisata', $fileName, 'public');

                $paket_wisata->foto5 = $fileName;
            }

            $paket_wisata->save();
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
         }

        public function destroy(Request $request, $id) {
            //Menghapus paketwisata
            $paket_wisata=PaketWisata::find($id);
    
            if ($paket_wisata) {
                // Hapus foto dari penyimpanan
                Storage::disk('public')->delete('Foto paketwisata/' . $paket_wisata->foto1);
                Storage::disk('public')->delete('Foto paketwisata/' . $paket_wisata->foto2);
                Storage::disk('public')->delete('Foto paketwisata/' . $paket_wisata->foto3);
                Storage::disk('public')->delete('Foto paketwisata/' . $paket_wisata->foto4);
                Storage::disk('public')->delete('Foto paketwisata/' . $paket_wisata->foto5);
                    
                // Hapus Paket Wisata dari database
                $paket_wisata->delete();
            }
            return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata');
         }
}
