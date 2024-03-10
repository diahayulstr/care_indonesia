<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunikasi extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id', 'tanggal', 'saluran_id', 'jenjang_komunikasi_id', 'tindak_lanjut_id', 'catatan', 'tgl_selanjutnya', 'dokumen'];

    public function donorID()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function saluran()
    {
        return $this->belongsTo(TabelSaluran::class, 'saluran_id');
    }

    public function jenjangKomunikasi()
    {
        return $this->belongsTo(TabelJenjangKomunikasi::class, 'jenjang_komunikasi_id');
    }

    public function tindakLanjut()
    {
        return $this->belongsTo(TabelTindakLanjut::class, 'tindak_lanjut_id');
    }
}
