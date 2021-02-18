<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_ta';

    public $fillable = [
    	'tahun_ajaran',
    ];

    
    public function pesertadidik()
    {
        return $this -> hasMany(Pesertadidik::class, 'id_ta', 'id_ta');
    }

    public function orangtua()
    {
        return $this -> hasMany(Orangtua::class, 'id_ta', 'id_ta');
    }

     public function mutasimasuk()
    {
        return $this -> hasMany(Mutasimasuk::class,'id_ta', 'id_ta');
    }

    public function mutasikeluar()
    {
        return $this -> hasMany(MutasiKeluar::class, 'id_ta', 'id_ta');
    }

      public function alumni()
    {
        return $this -> hasMany(Alumni::class, 'id_ta', 'id_ta');
    }
}
