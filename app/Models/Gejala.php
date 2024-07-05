<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = "gejala";
    protected $fillable = [
        'kode_gejala','nama_gejala','gambar'
    ];

    public function penyakits()
{
    return $this->belongsToMany(Penyakit::class, 'rules', 'gejala_id', 'penyakit_id');
}

public function rules()
{
    return $this->hasMany(Rule::class, 'gejala_id');
}
}

