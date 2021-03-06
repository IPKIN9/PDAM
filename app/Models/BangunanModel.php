<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangunanModel extends Model
{
    use HasFactory;
    protected $table = 'bangunan';
    protected $fillable = [
        'id',
        'kode_bangunan',
        'no_sambungan',
        'luas_tanah',
        'jenis_bangunan',
        'status_bangunan',
        'perumahan_sambungan',
        'sumber_air',
        'pmj',
        'nama_sebelumnya',
        'no_sebelumnya',
        'created_at',
        'updated_at',
    ];
}
