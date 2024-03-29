<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'nama', 'guru_id'
    ];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function guru() {
        return $this->belongsTo(Guru::class);
    }
}
