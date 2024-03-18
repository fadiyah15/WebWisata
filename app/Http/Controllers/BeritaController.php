<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::all();
        return view('berita.index', [
        'berita' => $berita,
        'kategori_berita' => KategoriBerita::all()
        ]);
        }

        // public function create(){
        //     return view(
        //         'berita.create', [
        //             'kategori_berita' => KategoriBerita::all()
        // ]);
        // }

        public function store(Request $request) {
            //Menyimpan Data Berita
            $request->validate([ 
                'judul'=> 'required|unique:berita,judul',
                'berita'=> 'required',
                'tgl_post'=> 'required',
                'id_kategori_berita' => 'required',
                'foto'=> 'required|image|file|max:2048'
                ]);

            $berita = new Berita();
            if($request->hasfile('foto')) {
                $file = $request->file('foto');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto berita', $fileName, 'public');
    
                $berita->foto = $fileName;
            }

            $berita->judul = $request->judul;
            $berita->berita = $request->berita;
            $berita->tgl_post = $request->tgl_post;
            $berita->id_kategori_berita = $request->id_kategori_berita;

            $berita->save();
            return redirect()->route('berita.index') ->with('success_message', 'Berhasil menambah Berita baru');
        }

    //     public function edit($id){
    //         //Menampilkan Form Edit
    //         $berita = Berita::find($id);
    //         if (!$berita) return redirect()->route('berita.index')
    //         ->with('error_message', 'berita dengan id = ' . $id . ' tidak ditemukan');
    //         return view('berita.edit', [
    //             'berita' => $berita,
    //             'kategori_berita' => KategoriBerita::all()
    //         ]);
    // }
    
    public function update(Request $request, $id) {
            //Menyimpan Data Berita
            $request->validate([ 
                'judul'=> 'required|unique:berita,judul',
                'berita'=> 'required',
                'tgl_post'=> 'required',
                'id_kategori_berita' => 'required',
                'foto'=> 'required'
                ]);

            $berita = Berita::find($id);

            if (! $berita) {
                return redirect()->back()->with('error_message', 'Data tidak ditemukan');
            }
    
            $berita->judul = $request->judul;
            $berita->berita = $request->berita;
            $berita->tgl_post = $request->tgl_post;
            $berita->id_kategori_berita = $request->id_kategori_berita;

            if($request->hasfile('foto')) {
                $file = $request->file('foto');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto berita', $fileName, 'public');
    
                $berita->foto = $fileName;
            }

            $berita->save();
            return redirect()->route('berita.index')->with('success_message', 'Berhasil mengubah Berita');
         }

    public function destroy($id) {
        // Menghapus Berita
        $berita = Berita::find($id);
        
        if ($berita) {
            // Hapus foto dari penyimpanan
            Storage::disk('public')->delete('Foto berita/' . $berita->foto);
                
            // Hapus berita dari database
            $berita->delete();
        }
        return redirect()->route('berita.index')->with('success_message', 'Berhasil menghapus Berita');
    }
}
