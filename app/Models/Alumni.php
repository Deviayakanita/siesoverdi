<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
	protected $table = 'alumni_siswa';
    protected $primaryKey = 'id_alumni';

    public $fillable = [
        // 'nis',
    	'nm_pt',
    	'id_siswa',
    	'jns_pt',
        'nm_fak',
        'nm_jurusan',
        'melanjutkan',
        'status_alumni',
    ];
}
