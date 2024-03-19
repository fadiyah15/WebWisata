<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObyekWisata;
use App\Models\KategoriWisata;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ObyekWisataController extends Controller
{
    public function index(){
        $obyek_wisata = ObyekWisata::all();
        return view('obyek_wisata.index', [
        'obyek_wisata' => $obyek_wisata,
        'kategori_wisata' => KategoriWisata::all()
        ]);
        }

        public function create(){
            return view(
                'obyek_wisata.create', [
                'kategori_wisata' => KategoriWisata::all()
        ]);
        }

        public function store(Request $request) {
            //Menyimpan Data obyek_wisata
            $request->validate([ 
                'nama_wisata'=> 'required|unique:obyek_wisata,nama_wisata',
                'deskripsi_wisata'=> 'required',
                'id_kategori_wisata'=> 'required',
                'fasilitas'=> 'required',
                'foto1'=> 'required|image|file|max:2048',
                'foto2'=> 'required|image|file|max:2048',
                'foto3'=> 'required|image|file|max:2048',
                'foto4'=> 'required|image|file|max:2048',
                'foto5'=> 'required|image|file|max:2048'
                ]);

            $obyek_wisata = new ObyekWisata();
            if($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto1 = $fileName;
            }
    
            if($request->hasfile('foto2')) {
                $file = $request->file('foto2');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto2 = $fileName;
            }
    
            if($request->hasfile('foto3')) {
                $file = $request->file('foto3');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto3 = $fileName;
            }
    
            if($request->hasfile('foto4')) {
                $file = $request->file('foto4');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto4 = $fileName;
            }
    
            if($request->hasfile('foto5')) {
                $file = $request->file('foto5');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto5 = $fileName;
            }

            $obyek_wisata->nama_wisata = $request->nama_wisata;
            $obyek_wisata->deskripsi_wisata = $request->deskripsi_wisata;
            $obyek_wisata->id_kategori_wisata = $request->id_kategori_wisata;
            $obyek_wisata->fasilitas = $request->fasilitas;

            $obyek_wisata->save();
            return redirect()->route('obyek_wisata.index') ->with('success_message', 'Berhasil menambah Obyek Wisata baru');
        }

        public function detail(Request $request, $id)
        {
            $obyek_wisata = ObyekWisata::findOrFail($id);    
            return view('obyek_wisata.detail', [
                'obyek_wisata' => $obyek_wisata,
            ]);
        }

        // public function edit($id){
        //     //Menampilkan Form Edit
        //     $obyek_wisata = ObyekWisata::find($id);
        //     if (!$obyek_wisata) return redirect()->route('obyek_wisata.index')
        //     ->with('error_message', 'obyek_wisata dengan id = ' . $id . ' tidak ditemukan');
        //     return view('obyek_wisata.edit', [
        //         'obyek_wisata' => $obyek_wisata,
        //         'kategori_wisata' => KategoriWisata::all()
        //     ]);
        // }

        public function update(Request $request, $id) {
            //Menyimpan Data obyek_wisata
            $request->validate([ 
                'nama_wisata'=> 'required',
                'deskripsi_wisata',
                'id_kategori_wisata',
                'fasilitas'=> 'required',
                'foto1'=> '',
                'foto2'=> '',
                'foto3'=> '',
                'foto4'=> '',
                'foto5'=> ''
                ]);

            $obyek_wisata = ObyekWisata::find($id);

            if (! $obyek_wisata) {
                return redirect()->back()->with('error_message', 'Data tidak ditemukan');
            }
    
            $obyek_wisata->nama_wisata = $request->nama_wisata;
            $obyek_wisata->deskripsi_wisata = $request->deskripsi_wisata;
            $obyek_wisata->id_kategori_wisata = $request->id_kategori_wisata;
            $obyek_wisata->fasilitas = $request->fasilitas;

            if($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto1 = $fileName;
            }
    
            if($request->hasfile('foto2')) {
                $file = $request->file('foto2');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto2 = $fileName;
            }
    
            if($request->hasfile('foto3')) {
                $file = $request->file('foto3');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto3 = $fileName;
            }
    
            if($request->hasfile('foto4')) {
                $file = $request->file('foto4');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto4 = $fileName;
            }
    
            if($request->hasfile('foto5')) {
                $file = $request->file('foto5');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto obyekwisata', $fileName, 'public');
    
                $obyek_wisata->foto5 = $fileName;
            }

            $obyek_wisata->save();
            return redirect()->route('obyek_wisata.index')->with('success_message', 'Berhasil mengubah Obyek Wisata');
         }

         public function destroy(Request $request, $id) {
            //Menghapus obyek_wisata
            $obyek_wisata=ObyekWisata::find($id);
    
            if ($obyek_wisata) {
                // Hapus foto dari penyimpanan
                Storage::disk('public')->delete('Foto obyekwisata/' . $obyek_wisata->foto1);
                Storage::disk('public')->delete('Foto obyekwisata/' . $obyek_wisata->foto2);
                Storage::disk('public')->delete('Foto obyekwisata/' . $obyek_wisata->foto3);
                Storage::disk('public')->delete('Foto obyekwisata/' . $obyek_wisata->foto4);
                Storage::disk('public')->delete('Foto obyekwisata/' . $obyek_wisata->foto5);
                    
                // Hapus Obyek Wisata dari database
                $obyek_wisata->delete();
            }
            return redirect()->route('obyek_wisata.index') ->with('success_message', 'Berhasil menghapus Obyek Wisata');
        }
    
}
