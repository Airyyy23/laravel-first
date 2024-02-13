<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    private static $students = [
            [
                "id" => 21,
                "nis" => "001",
                "nama" => "wayangseno",
                "kelas" => "10 PPLG 1",
                "alamat" => "kudus"
            ],
            [
                "id" => 26,
                "nis" => "002",
                "nama" => "ilhami",
                "kelas" => "10 PPLG 1",
                "alamat" => "jepara"
            ],
            [
                "id" => 39,
                "nis" => "003",
                "nama" => "repi",
                "kelas" => "10 PPLG 1",
                "alamat" => "sumbawa"
            ],
            [
                "id" => 42,
                "nis" => "004",
                "nama" => "nando",
                "kelas" => "10 PPLG 1",
                "alamat" => "bekasi"
            ],
            [
                "id" => 55,
                "nis" => "005",
                "nama" => "alfanich gunshop",
                "kelas" => "10 PPLG 1",
                "alamat" => "markas militer"
            ]
        ];

        public static function all()
        {
            return self::$students;
        }
}
