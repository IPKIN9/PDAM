<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'id',
        'nama',
        'pangkat',
        'jabatan',
        'created_at',
        'updated_at',
    ];
}
