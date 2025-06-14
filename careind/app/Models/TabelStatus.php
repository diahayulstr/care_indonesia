<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function narahubungs()
    {
        return $this->hasMany(Narahubung::class, 'status_id');
    }
}
