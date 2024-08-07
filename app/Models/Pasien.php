<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['alamat', 'no_telepon'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
