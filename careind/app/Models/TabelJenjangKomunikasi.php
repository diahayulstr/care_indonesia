<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelJenjangKomunikasi extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function komunikasis()
    {
        return $this->hasMany(Komunikasi::class, 'jenjang_komunikasi_id');
    }
}
