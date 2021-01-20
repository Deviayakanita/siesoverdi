<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasikeluar extends Model
{
	protected $table = 'mutasi_keluar';
    protected $primaryKey = 'id_mut_klr';

    public $fillable = [
    	'no_srt_pindah',
    	'id_siswa',
    	'sekolah_tujuan',
        'tingkat_kelas',
        'tgl_pindah',
        'alasan_pindah',
        'status_mutasi',
    ];

    public function pesertadidik()
    {
        return $this -> belongsTo(Pesertadidik::class, 'id_siswa', 'id_siswa');
    }
}
