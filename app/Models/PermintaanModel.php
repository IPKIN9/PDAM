<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanModel extends Model
{
    use HasFactory;
    protected $table ="permintaan";
    protected $fillable = [
        'id',
        'kode_booking',
        'nama',
        'alamat',
        'created_at',
        'updated_at',
    ];
}
