<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasikeluar extends Model
{
	protected $table = 'mutasi_keluar';
    protected $primaryKey = 'id_mut_klr';
    protected $dates = ['tgl_pindah'];

    public $fillable = [
    	'no_srt_pindah',
    	'id_siswa',
    	'sekolah_tujuan',
        'tingkat_kelas',
        'tgl_pindah',
        'alasan_pindah',
    ];

    public function tahun()
    {
        return $this -> belongsTo(Tahun::class, 'id_ta', 'id_ta');
    }

    public function pesertadidik()
    {
        return $this -> belongsTo(Pesertadidik::class, 'id_siswa', 'id_siswa');
    }
}
