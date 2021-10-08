<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'id',
        'id_user',
        'id_pelanggan',
        'id_pemakaian',
        'ppa',
        'denda',
        'total',
        'telah_dibayar',
        'tgl_pembayaran',
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