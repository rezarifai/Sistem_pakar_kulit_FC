<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;

    protected $table = 'diagnosa';
    protected $fillable = ['user_id', 'tanggal_diagnosa', 'penyakit_id', 'persentase', 'gejala_terpilih'];

    protected $casts = [
        'gejala_terpilih' => 'array',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

}
