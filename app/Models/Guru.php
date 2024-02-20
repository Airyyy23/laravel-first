<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'nama', 'kelas_id', 'tanggal_lahir', 'alamat'
    ];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
}
