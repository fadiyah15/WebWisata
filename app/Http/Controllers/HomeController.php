<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Paketwisata;
use App\Models\ObyekWisata;
use App\Models\Penginapan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $obyek_wisata = ObyekWisata::all();
        $penginapan = Penginapan::all();
        $berita = Berita::all();
        $paket_wisata = PaketWisata::all();
        return view('homepage', compact('berita','paket_wisata', 'obyek_wisata', 'penginapan'));
    }

    public function show($id)
    {
        $berita = Berita::find($id);

        return view('blog', compact('berita'));
    }

    // public function blogs()
    // {
    //     $berita = Berita::all();

    //     return view('blogs', compact('berita'));
    // }

    // public function homestay()
    // {
    //     $penginapan= Penginapan::all();

    //     return view('homestay', compact('penginapan'));
    // }
    public function obyekshow($id)
    {
        $obyek_wisata = ObyekWisata::find($id);

        return view('obyekshow', compact('obyek_wisata'));
    }

    public function penginapanshow($id)
    {
        $penginapan = Penginapan::find($id);

        return view('penginapanshow', compact('penginapan'));
    }


}