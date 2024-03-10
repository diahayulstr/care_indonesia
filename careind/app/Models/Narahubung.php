<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narahubung extends Model
{
    use HasFactory;
    protected $fillable = ['donor_id', 'nama_kontak', 'jabatab', 'email', 'no_telp', 'status_id'];

    public function status()
    {
        return $this->belongsTo(TabelStatus::class, 'status_id');
    }

    public function donorID()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }
}
