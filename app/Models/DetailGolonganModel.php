<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailGolonganModel extends Model
{
    use HasFactory;
    protected $table = 'detail_golongan';
    protected $fillable = [
        'id',
        'id_golongan',
        'sub_golongan',
        'jumlah_rek_air',
        'meter',
        'jumlah_tagihan',
        'harga_air',
        'jasa_adm',
        'dana_meter',
        'harga_rata',
        'created_at',
        'updated_at',
    ];
    
    public function golongan_role()
    {
        return $this->belongsTo(GolonganModel::class,'id_golongan');
    }
}