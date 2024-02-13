<?php

use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Models\Student;
use App\Models\Students;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "home"
    ]);
});

Route::group(["prefix" => "/login"], function() {
    Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/add', [LoginController::class, 'authenticate']);
});

Route::group(["prefix" => "/register"], function() {
    Route::get('/', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/add', [RegisterController::class, 'store']);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "nama" => "wayangseno",
        "kelas" => "10 PPLG 1",
        "jurusan" => "PPLG",
        "foto" => "./assets/messi.webp"
    ]);
});

Route::group(["prefix" => "/student"], function() {
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create']);
    Route::post('/add', [StudentsController::class, 'store']);
    Route::delete('/destroy/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::put('/update/{student}', [StudentsController::class, 'update']);
});

Route::group(['prefix' => '/kelas'], function() {
    Route::get('/', [KelasController::class, 'index']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/add', [KelasController::class, 'store']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::put('/update/{kelas}', [KelasController::class, 'update']);
    Route::delete('/destroy/{kelas}', [KelasController::class, 'destroy']);
});



Route::get('/extra', [ExtracurricularController::class, 'index']);


Route::get('/hello', function () {
    return '<h1>Hello WOrld</h1>';
});

