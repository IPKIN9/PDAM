<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = [
        'id',
        'id_bangunan',
        'id_golongan',
        'id_detail_golongan',
        'status',
        'nama',
        'alamat',
        'rt_rw',
        'kecamatan',
        'kabupaten',
        'no_pendaftaran',
        'alamat_sambungan',
        'jumlah_penghuni',
        'created_at',
        'updated_at',
    ];

    public function bangunan_role()
    {
        return $this->belongsTo(BangunanModel::class, 'id_bangunan');
    }
    public function golongan_role()
    {
        return $this->belongsTo(GolonganModel::class, 'id_golongan');
    }
    public function detail_role()
    {
        return $this->belongsTo(DetailGolonganModel::class, 'id_detail_golongan');
    }
}
