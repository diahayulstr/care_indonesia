<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelJenisIntermediary extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'jenis_intermediary_id');
    }
}
