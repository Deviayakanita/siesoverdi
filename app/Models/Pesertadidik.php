<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesertadidik extends Model
{
	protected $table = 'peserta_didik';
    protected $primaryKey = 'id_siswa';

    public $fillable = [
    	'nm_siswa',
    	'id_user',
        'jns_kelamin',
        'nis',
        'tmp_lahir',
        'tgl_lahir',
        'agama',
        'alamat_siswa',
        'provinsi',
        'kabupaten',
        'no_tlpn',
        'email',
        'tahun_ajaran',
        'jurusan',
        'sts_siswa',
        'keterangan',
    ];
}
