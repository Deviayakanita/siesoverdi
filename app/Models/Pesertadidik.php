<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesertadidik extends Model
{
	protected $table = 'peserta_didik';
    protected $primaryKey = 'id_siswa';
    protected $dates = ['tgl_lahir'];

    public $fillable = [
    	'nm_siswa',
    	'id_ta',
        'jns_kelamin',
        'nis',
        'tmp_lahir',
        'tgl_lahir',
        'agama',
        'alamat_siswa',
        'kabupaten',
        'no_tlpn',
        'email',
        'tahun_ajaran',
        'jurusan',
        'sts_siswa',
        'keterangan',
    ];

    
    public function tahun()
    {
        return $this -> belongsTo(Tahun::class, 'id_ta', 'id_ta');
    }


    public function orangtua()
    {
        return $this -> hasOne(Orangtua::class, 'id_siswa', 'id_siswa');
    }

     public function mutasimasuk()
    {
        return $this -> hasOne(Mutasimasuk::class,'id_siswa', 'id_siswa');
    }

    public function mutasikeluar()
    {
        return $this -> hasOne(MutasiKeluar::class, 'id_siswa', 'id_siswa');
    }

      public function alumni()
    {
        return $this -> hasOne(Alumni::class, 'id_siswa', 'id_siswa');
    }
}
