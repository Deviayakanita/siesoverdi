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
        // 'nis',
    	'id_siswa',
    	'sekolah_tujuan',
        'tingkat_kelas',
        'tgl_pindah',
        'alasan_pindah',
        'status_mutasi',
    ];
}
