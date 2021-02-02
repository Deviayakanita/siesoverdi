<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
	protected $table = 'alumni_siswa';
    protected $primaryKey = 'id_alumni';

    public $fillable = [
        'id_siswa',
    	'nm_pt',
    	'id_siswa',
    	'jns_pt',
        'nm_fak',
        'nm_jurusan',
        'status_alumni',
    ];

    public function pesertadidik()
    {
        return $this -> belongsTo(Pesertadidik::class, 'id_siswa', 'id_siswa');
    }
}
