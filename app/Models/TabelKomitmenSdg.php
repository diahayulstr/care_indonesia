<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelKomitmenSdg extends Model
{
    use HasFactory;
    // protected $table = ['tabel_komitmen_sdgs'];
    protected $fillable = ['name'];

    public function donors()
    {
        return $this->hasMany(Donor::class, 'komitmen_sdgs');
    }
}
