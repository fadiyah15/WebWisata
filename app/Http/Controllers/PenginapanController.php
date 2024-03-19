<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penginapan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PenginapanController extends Controller
{
    public function index(){
        $penginapan = Penginapan::all();
        return view('penginapan.index', [
        'penginapan' => $penginapan
        ]);
    }

    public function detail(Request $request, $id)
    {
        $penginapan = Penginapan::findOrFail($id);    
        return view('penginapan.detail', [
            'penginapan' => $penginapan,
        ]);
    }


        public function store(Request $request) {
            //Menyimpan Data penginapan
            $request->validate([ 
                'nama_penginapan'=> 'required|unique:penginapan,nama_penginapan',
                'deskripsi'=> 'required',
                'fasilitas'=> 'required',
                'foto1'=> 'required|image|file|max:2048',
                'foto2'=> 'required|image|file|max:2048',
                'foto3'=> 'required|image|file|max:2048',
                'foto4'=> 'required|image|file|max:2048',
                'foto5'=> 'required|image|file|max:2048'
                ]);

            $penginapan = new Penginapan();
            if($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto1 = $fileName;
            }
        
            if($request->hasfile('foto2')) {
                $file = $request->file('foto2');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto2 = $fileName;
            }
        
            if($request->hasfile('foto3')) {
                $file = $request->file('foto3');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto3 = $fileName;
            }
        
            if($request->hasfile('foto4')) {
                $file = $request->file('foto4');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto4 = $fileName;
            }
        
            if($request->hasfile('foto5')) {
                $file = $request->file('foto5');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto5 = $fileName;
            }

            $penginapan->nama_penginapan = $request->nama_penginapan;
            $penginapan->deskripsi = $request->deskripsi;
            $penginapan->fasilitas = $request->fasilitas;

            $penginapan->save();
            return redirect()->route('penginapan.index') ->with('success_message', 'Berhasil menambah Penginapan baru');
        }

        public function update(Request $request, $id) {
            //Menyimpan Data penginapan
            $request->validate([ 
                'nama_penginapan'=> 'required',
                'deskripsi'=> 'required',
                'fasilitas'=> 'required',
                'foto1'=> '',
                'foto2'=> '',
                'foto3'=> '',
                'foto4'=> '',
                'foto5'=> ''
                ]);

            $penginapan = Penginapan::find($id);
            $penginapan->nama_penginapan = $request->nama_penginapan;
            $penginapan->deskripsi = $request->deskripsi;
            $penginapan->fasilitas = $request->fasilitas;

            if($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto1 = $fileName;
            }
        
            if($request->hasfile('foto2')) {
                $file = $request->file('foto2');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto2 = $fileName;
            }
        
            if($request->hasfile('foto3')) {
                $file = $request->file('foto3');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto3 = $fileName;
            }
        
            if($request->hasfile('foto4')) {
                $file = $request->file('foto4');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto4 = $fileName;
            }
        
            if($request->hasfile('foto5')) {
                $file = $request->file('foto5');
                $fileName = Str::random(10). '.'.$file->getClientOriginalExtension();
                $file->storeAs('Foto penginapan', $fileName, 'public');
        
                $penginapan->foto5 = $fileName;
            }

            $penginapan->save();
            return redirect()->route('penginapan.index')->with('success_message', 'Berhasil mengubah Penginapan');
         }

         public function destroy(Request $request, $id) {
            //Menghapus penginapan
            $penginapan= Penginapan::find($id);
    
            if ($penginapan) {
                // Hapus foto dari penyimpanan
                Storage::disk('public')->delete('Foto penginapan/' . $penginapan->foto1);
                Storage::disk('public')->delete('Foto penginapan/' . $penginapan->foto2);
                Storage::disk('public')->delete('Foto penginapan/' . $penginapan->foto3);
                Storage::disk('public')->delete('Foto penginapan/' . $penginapan->foto4);
                Storage::disk('public')->delete('Foto penginapan/' . $penginapan->foto5);
                    
                // Hapus Obyek Wisata dari database
                $penginapan->delete();
            }
            return redirect()->route('penginapan.index') ->with('success_message', 'Berhasil menghapus Penginapan');
        }
    
}
