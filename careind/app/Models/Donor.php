<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $fillable = ['nama_organisasi', 'alamat', 'negara', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'desa_id', 'website', 'informasi_singkat', 'jenis_organisasi_id', 'komitmen_sdgs_id', 'date', 'dokumen'];

    public function provinsi()
    {
        return $this->belongsTo(Province::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Regency::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(District::class);
    }

    public function desa()
    {
        return $this->belongsTo(Village::class);
    }

    public function jenisOrganisasi()
    {
        return $this->belongsTo(TabelJenisOrganisasi::class, 'jenis_organisasi_id');
    }

    public function komitmenSdgs()
    {
        return $this->belongsTo(TabelKomitmenSdg::class, 'komitmen_sdgs_id');
    }
}
