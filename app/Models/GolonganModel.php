<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganModel extends Model
{
    use HasFactory;
    protected $table = 'golongan';
    protected $fillable = [
        'id',
        'kode_golongan',
        'golongan',
        'unit',
        'created_at',
        'updated_at',
    ];
}
