<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelSaluranPendanaan extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'saluran_pendanaan_id');
    }
}
