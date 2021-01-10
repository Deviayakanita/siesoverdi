<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasimasuk extends Model
{
	protected $table = 'mutasi_masuk';
    protected $primaryKey = 'id_mut_msk';

    public $fillable = [
    	'no_srt_pindah',
        // 'nis',
    	'id_siswa',
    	'asal_sekolah',
        'tingkat_kelas',
        'tgl_masuk',
        'alasan_pindah',
        'status_mutasi',
    ];
}
