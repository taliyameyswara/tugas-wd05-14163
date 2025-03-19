<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Periksa extends Model
{
    protected $table = 'periksa';
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa'
    ];

    public function dokter(){
        return $this->belongsTo(User::class, 'id_dokter');
    }

    public function pasien(){
        return $this->belongsTo(User::class,'id_pasien');
    }
}
