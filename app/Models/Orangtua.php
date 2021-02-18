<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
	protected $table = 'orang_tua';
    protected $primaryKey = 'id_orang_tua';

    public $fillable = [
        'id_siswa',
    	'nm_ayah',
    	'id_siswa',
    	'job_ayah',
        'pddk_ayah',
        'penghasilan_ayah',
        'nm_ibu',
        'job_ibu',
        'pddk_ibu',
        'penghasilan_ibu',

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
