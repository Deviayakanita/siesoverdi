<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
	protected $table = 'orang_tua';
    protected $primaryKey = 'id_orang_tua';

    public $fillable = [
        // 'nis',
    	'nm_ayah',
    	'id_siswa',
    	'job_ayah',
        'pddk_ayah',
        'penghasilan_ayah',
        'nm_ibu',
        'job_ibu',
        'pddk_ibu',
        'penghasilan_ibu',
        'sts_orang_tua',

    ];
}
