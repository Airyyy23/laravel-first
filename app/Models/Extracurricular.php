<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular
{
    private static $extracurricular = [
        [
            "id" => 21,
            "nama" => "esports",
            "nama_pembina" => "nando",
            "deskripsi" => "extracurricular esports",
        ],
        [
            "id" => 26,
            "nama" => "futsal",
            "nama_pembina" => "altan",
            "deskripsi" => "extracurricular futsal"
        ],
        [
            "id" => 39,
            "nama" => "basket",
            "nama_pembina" => "aufa",
            "deskripsi" => "extracurricular basket"
        ],
        [
            "id" => 42,
            "nama" => "teater",
            "nama_pembina" => "ilhami",
            "deskripsi" => "extracurricular teater"
        ],
        [
            "id" => 55,
            "nama" => "militer",
            "nama_pembina" => "alfnich",
            "deskripsi" => "extracurricular militer"
        ]
    ];

    public static function all()
    {
        return self::$extracurricular;
    }
}
