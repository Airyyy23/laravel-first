<?php

use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\DashboardKelasController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\DashboardStudentsController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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
    return view('home', [
        "title" => "Home"
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



Route::group(["prefix" => "/student"], function() {
    Route::get('/', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create'])->middleware('auth');
    Route::post('/add', [StudentsController::class, 'store'])->middleware('auth');
    Route::delete('/destroy/{student}', [StudentsController::class, 'destroy'])->middleware('auth');
    Route::get('/edit/{student}', [StudentsController::class, 'edit'])->middleware('auth');
    Route::put('/update/{student}', [StudentsController::class, 'update'])->middleware('auth');
    Route::get('/search', [StudentsController::class, 'index']);
    Route::get('/filter/{kelas_id}', [StudentsController::class, 'filter']);
});

Route::group(['prefix' => '/kelas'], function() {
    Route::get('/', [KelasController::class, 'index']);
    Route::get('/create', [KelasController::class, 'create'])->middleware('auth');
    Route::post('/add', [KelasController::class, 'store'])->middleware('auth');
    Route::get('/edit/{kelas}', [KelasController::class, 'edit'])->middleware('auth');
    Route::put('/update/{kelas}', [KelasController::class, 'update'])->middleware('auth');
    Route::get('/search', [KelasController::class, 'index']);
    Route::delete('/destroy/{kelas}', [KelasController::class, 'destroy'])->middleware('auth');
});

Route::group(["prefix" => "/guru"], function() {
    Route::get('/', [GuruController::class, 'index']);
    Route::get('/detail/{guru}', [GuruController::class, 'show']);
    Route::get('/create', [GuruController::class, 'create'])->middleware('auth');
    Route::post('/add', [GuruController::class, 'store'])->middleware('auth');
    Route::delete('/destroy/{guru}', [GuruController::class, 'destroy'])->middleware('auth');
    Route::get('/edit/{guru}', [GuruController::class, 'edit'])->middleware('auth');
    Route::put('/update/{guru}', [GuruController::class, 'update'])->middleware('auth');
    Route::get('/search', [GuruController::class, 'index']);
    Route::get('/filter/{kelas_id}', [GuruController::class, 'filter']);
});

Route::group(["prefix" => "/dashboard"], function() {
    Route::get('/', function () {
        return view('dashboard.dashboard', [
            "title" => "Dashboard"
        ]);
    })->middleware('auth');

    Route::group(["prefix" => "/student"], function() {
        Route::get('/', [DashboardStudentController::class, 'index']);
        Route::get('/detail/{student}', [DashboardStudentController::class, 'show']);
        Route::get('/create', [DashboardStudentController::class, 'create'])->middleware('auth');
        Route::post('/add', [DashboardStudentController::class, 'store'])->middleware('auth');
        Route::delete('/destroy/{student}', [DashboardStudentController::class, 'destroy'])->middleware('auth');
        Route::get('/edit/{student}', [DashboardStudentController::class, 'edit'])->middleware('auth');
        Route::put('/update/{student}', [DashboardStudentController::class, 'update'])->middleware('auth');
        Route::get('/search', [DashboardStudentController::class, 'index']);
        Route::get('/filter/{kelas_id}', [DashboardStudentController::class, 'filter']);
    });

    Route::group(['prefix' => '/kelas'], function() {
        Route::get('/', [DashboardKelasController::class, 'index']);
        Route::get('/create', [DashboardKelasController::class, 'create'])->middleware('auth');
        Route::post('/add', [DashboardKelasController::class, 'store'])->middleware('auth');
        Route::get('/edit/{kelas}', [DashboardKelasController::class, 'edit'])->middleware('auth');
        Route::put('/update/{kelas}', [DashboardKelasController::class, 'update'])->middleware('auth');
        Route::get('/search', [DashboardKelasController::class, 'index']);
        Route::delete('/destroy/{kelas}', [DashboardKelasController::class, 'destroy'])->middleware('auth');
    });
    
    Route::group(["prefix" => "/guru"], function() {
        Route::get('/', [DashboardGuruController::class, 'index']);
        Route::get('/detail/{guru}', [DashboardGuruController::class, 'show']);
        Route::get('/create', [DashboardGuruController::class, 'create'])->middleware('auth');
        Route::post('/add', [DashboardGuruController::class, 'store'])->middleware('auth');
        Route::delete('/destroy/{guru}', [DashboardGuruController::class, 'destroy'])->middleware('auth');
        Route::get('/edit/{guru}', [DashboardGuruController::class, 'edit'])->middleware('auth');
        Route::put('/update/{guru}', [DashboardGuruController::class, 'update'])->middleware('auth');
        Route::get('/search', [DashboardGuruController::class, 'index']);
        Route::get('/filter/{kelas_id}', [DashboardGuruController::class, 'filter']);
    });
});