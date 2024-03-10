<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id', 'tujuan_pendanaan_id', 'jenis_penerimaan_id',
                            'saluran_pendanaan_id', 'jenis_intermediary_id', 'nama_proyek',
                            'klasifikasi_portofolio_id', 'impact_goals_id', 'estimasi_nilai_usd',
                            'estimasi_nilai_idr', 'usulan_durasi', 'status_kemajuan_id', 'dokumen'];


    public function donorID()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function impactGoals()
    {
        return $this->belongsTo(TabelImpactGoals::class, 'impact_goals_id');
    }

    public function jenisIntermediary()
    {
        return $this->belongsTo(TabelJenisIntermediary::class, 'jenis_intermediary_id');
    }

    public function jenisPenerimaan()
    {
        return $this->belongsTo(TabelJenisPenerimaan::class, 'jenis_penerimaan_id');
    }

    public function klasifikasiPortofolio()
    {
        return $this->belongsTo(TabelKlasifikasiPortofolio::class, 'klasifikasi_porotofolio_id');
    }

    public function saluranPendanaan()
    {
        return $this->belongsTo(TabelSaluranPendanaan::class, 'saluran_pendanaan_id');
    }

    public function statusKemajuan()
    {
        return $this->belongsTo(TabelStatusKemajuan::class, 'status_kemajuan_id');
    }

    public function tujuanPendanaan()
    {
        return $this->belongsTo(TabelTujuanPendanaan::class, 'tujuan_pendanaan_id');
    }
}
