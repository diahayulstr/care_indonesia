<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = ['nama_organisasi', 'alamat', 'negara', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'desa_id', 'website', 'informasi_singkat', 'jenis_organisasi_id', 'komitmen_sdgs', 'date', 'dokumen',
    'nama_kontak', 'jabatab', 'email', 'no_telp', 'status_id',
    'tanggal', 'saluran_id', 'jenjang_komunikasi_id', 'tindak_lanjut_id', 'catatan', 'tgl_selanjutnya', 'dokumen',
    'tujuan_pendanaan_id', 'jenis_penerimaan_id', 'saluran_pendanaan_id', 'jenis_intermediaries_id','nama_proyek',
                            'klasifikasi_portfolio_id',
                            'impact_goals_id',
                            'estimasi_nilai_usd',
                            'estimasi_nilai_idr',
                            'usulan_durasi',
                            'status_kemajuan_id',
                            'dokumen'
    ];

    public function donorID()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
