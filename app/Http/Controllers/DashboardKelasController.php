<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Guru;

class DashboardKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::latest();
    
        if (request('search')) {
            $kelas->where('nama', 'like', '%' . request('search') . '%');
        }
    
        $kelas = $kelas->paginate(10);
    
        return view('dashboard.kelas.all', [
            "title" => "Kelas",
            "guru" => Guru::all(),
            "kelas" => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kelas $kelas) {
        return view('dashboard.kelas.create', [
            "title" => "Kelas",
            "kelas" => $kelas,
            "guru" => Guru::all()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'guru_id' => 'required',
        ]);
    
        try {
            Kelas::create($request->all());
    
            return redirect('/dashboard/kelas')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('dashboard.kelas.edit', [
            "title" => "Kelas",
            "kelas" => $kelas,
            "guru" => Guru::all()
        ]);
    }

    public function update(Request $request, $kelas) {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            $kelasModel = Kelas::findOrFail($kelas);
            $kelasModel->update($request->all());
            
            return redirect('/dashboard/kelas')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kelas)
    {
        try {
            $kelasModel = Kelas::findOrFail($kelas);
            $kelasModel->delete();

            return redirect('/dashboard/kelas')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/dashboard/kelas')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
}
