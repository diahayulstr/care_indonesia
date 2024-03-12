<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id',
                            'tujuan_pendanaan_id',
                            'jenis_penerimaan_id',
                            'saluran_pendanaan_id',
                            'jenis_intermediaries_id',
                            'nama_proyek',
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

    public function impactGoals()
    {
        return $this->belongsTo(TabelImpactGoals::class, 'impact_goals_id');
    }
 
    // public function impactGoals()
    // {
    //     return $this->belongsToMany(TabelImpactGoals::class, 'impact_goal_proposal', 'proposal_id', 'impact_goal_id');
    // }

    public function klasifikasiPortfolios()
    {
        return $this->belongsTo(TabelKlasifikasiPortfolios::class, 'klasifikasi_portfolio_id');
    }

    public function jenisIntermediaries()
    {
        return $this->belongsTo(TabelJenisIntermediaries::class, 'jenis_intermediaries_id');
    }

    public function jenisPenerimaan()
    {
        return $this->belongsTo(TabelJenisPenerimaan::class, 'jenis_penerimaan_id');
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
