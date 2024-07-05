<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = "penyakit";
    protected $fillable = ['kode_penyakit', 'nama_penyakit', 'penyebab', 'solusi', 'gambar'];

    public function gejalas()
{
    return $this->belongsToMany(Gejala::class, 'rules', 'penyakit_id', 'gejala_id');
}

public function rules()
    {
        return $this->hasMany(Rule::class, 'penyakit_id');
    }
}
