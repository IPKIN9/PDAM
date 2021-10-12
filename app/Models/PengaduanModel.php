<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanModel extends Model
{
    use HasFactory;
    protected $table = "pengaduan";
    protected $fillable = [
        'id',
        'nama',
        'no_telpon',
        'kerusakan',
        'keterangan',
        'created_at',
        'updated_at',
    ];
}
