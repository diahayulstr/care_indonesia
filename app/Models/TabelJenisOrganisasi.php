<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelJenisOrganisasi extends Model
{
    use HasFactory;
    // protected $table = ['tabel_jenis_organisasis'];
    protected $fillable = ['name'];

    public function donors()
    {
        return $this->hasMany(Donor::class, 'jenis_organisasi_id');
    }

}
