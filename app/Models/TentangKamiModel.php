<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKamiModel extends Model
{
    use HasFactory;
    protected $table = 'tentang';
    protected $fillable = [
        'id', 'des', 'alamat', 'wa', 'hp',
        'email', 'created_at', 'updated_at'
    ];
}
