<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = [
    'id_pelanggan',
    'id_paket',
    'tgl_reservasi_wisata',
    'harga',
    'jumlah_peserta',
    'diskon',
    'nilai_diskon',
    'total_bayar',
    'file_bukti_tf',
    'status_reservasi_wisata'  
    ];

    public function fplgn(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
        }

    public function fpktwsta(){
        return $this->belongsTo(PaketWisata::class, 'id_paket', 'id');
        }
}
