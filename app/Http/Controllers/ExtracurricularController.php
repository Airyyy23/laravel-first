<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index(){
        return view('extracurricular', [
            "title" => "extracurricular",
            "extracurricular" => Extracurricular::all()
        ]);
    }
}
