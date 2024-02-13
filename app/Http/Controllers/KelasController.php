<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('./kelas/all', [
            "title" => "kelas",
            "kelas" => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kelas $kelas) {
        return view('/kelas/create', [
            "title" => "create.kelas",
            "kelas" => $kelas
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
        ]);
    
        try {
            Kelas::create([
                'nama' => $request->nama,
            ]);
    
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan!');
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
        return view('kelas.edit', [
            "title" => "Edit Kelas",
            "kelas" => $kelas,
        ]);
    }

    public function update(Request $request, $kelas) {
        $request->validate([
            'nama' => 'required',
        ]);

        try {
            $kelasModel = Kelas::findOrFail($kelas);
            $kelasModel->update($request->all());
            
            return redirect('/kelas')->with('success', 'Data berhasil diedit!');
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

            return redirect('/kelas')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/kelas')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }
}
