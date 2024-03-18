<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;

class KategoriWisataController extends Controller
{
    public function index(){
        $kategori_wisata = KategoriWisata::all();
        return view('kategori_wisata.index', [
        'kategori_wisata' => $kategori_wisata
        ]);
        }

        public function store(Request $request) {
            //Menyimpan Data Kategori Wisata Baru
            $request->validate([ 
                'kategori_wisata'=> 'required|unique:kategori_wisata,kategori_wisata'
                ]);
                
                $array=$request->only(['kategori_wisata']);
                $kategori_wisata=KategoriWisata::create($array);
                return redirect()->route('kategori_wisata.index') ->with('success_message', 'Berhasil menambah Kategori Wisata baru');
            }

            public function edit($id) {
                //Menampilkan Form Edit
                $kategori_wisata=KategoriWisata::find($id);
                if (!$kategori_wisata) return redirect()->route('kategori_wisata.index')->with('error_message', 'Kategori Wisata dengan id'.$id.' tidak
                ditemukan');
                return view('kategori_wisata.edit', [
                'kategori_wisata' => $kategori_wisata
                ]);
            } 
        
            public function update(Request $request, $id) {
                ////Mengedit Data Kategori Wisata
                $request->validate([ 
                    'kategori_wisata'=> 'required|unique:kategori_wisata,kategori_wisata'
                    ]);
                    $kategori_wisata = KategoriWisata::find($id);
                    $kategori_wisata->kategori_wisata = $request->kategori_wisata;
                    $kategori_wisata->save();
                    return redirect()->route('kategori_wisata.index')->with('success_message', 'Berhasil mengubah Kategori Wisata');
                }
        
                public function destroy(Request $request, $id)
                {
                    //Menghapus Data Kategori Wisata
                    $kategori_wisata = KategoriWisata::find($id);
                    if ($kategori_wisata) $kategori_wisata->delete();
                    return redirect()->route('kategori_wisata.index')->with('success_message', 'Berhasil menghapus Kategori Wisata  !');
                }
    }
