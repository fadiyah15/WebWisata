<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
        public function index(){
        $kategori_berita = KategoriBerita::all();
        return view('kategori_berita.index', [
        'kategori_berita' => $kategori_berita
        ]);
        }
    
        public function create(){
            return view(
                'kategori_berita.create', [
        ]);
        }

        public function store(Request $request) {
            //Menyimpan Data Kategori Berita Baru
            $request->validate([ 
                'kategori_berita'=> 'required|unique:kategori_berita,kategori_berita'
                ]);
                
                $array=$request->only(['kategori_berita']);
                $kategori_berita=KategoriBerita::create($array);
                return redirect()->route('kategori_berita.index') ->with('success_message', 'Berhasil menambah Kategori Berita baru');
            }

            public function edit($id) {
                //Menampilkan Form Edit
                $kategori_berita=KategoriBerita::find($id);
                if (!$kategori_berita) return redirect()->route('kategori_berita.index')->with('error_message', 'Kategori Berita dengan id'.$id.' tidak
                ditemukan');
                return view('kategori_berita.edit', [
                'kategori_berita' => $kategori_berita
                ]);
            } 
        
            public function update(Request $request, $id) {
                ////Mengedit Data Kategori Berita
                $request->validate([ 
                    'kategori_berita'=> 'required|unique:kategori_berita,kategori_berita'
                    ]);
                    $kategori_berita = KategoriBerita::find($id);
                    $kategori_berita->kategori_berita = $request->kategori_berita;
                    $kategori_berita->save();
                    return redirect()->route('kategori_berita.index')->with('success_message', 'Berhasil mengubah Kategori Berita');
                }
        
                public function destroy(Request $request, $id)
                {
                    //Menghapus Data Kategori Berita
                    $kategori_berita = Kategoriberita::find($id);
                    if ($kategori_berita) $kategori_berita->delete();
                    return redirect()->route('kategori_berita.index')->with('success_message', 'Berhasil menghapus Kategori Berita  !');
                }
    }