<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemakaianModel extends Model
{
    use HasFactory;
    protected $table = 'pemakaian';
    protected $fillable = [
        'id',
        'id_user',
        'id_pelanggan',
        'kode_pemakaian',
        'jumlah_pemakaian',
        'created_at',
        'updated_at',
    ];
    public function user_role()
    {
       return $this->belongsTo(User::class, 'id_user');
    }
    public function pelanggan_role()
    {
       return $this->belongsTo(PelangganModel::class, 'id_pelanggan');
    }
    public function pemakaian_role()
    {
       return $this->belongsTo(PemakaianModel::class, 'id_pemakaian');
    }
}
