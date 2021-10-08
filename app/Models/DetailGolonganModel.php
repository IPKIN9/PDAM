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
        'tarif_air',
        'biaya_beban',
        'created_at',
        'updated_at',
    ];
    
    public function golongan_role()
    {
        return $this->belongsTo(GolonganModel::class,'id_golongan');
    }
}