<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DashboardGuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest();
    
        if (request('search')) {
            $guru->where('nama', 'like', '%' . request('search') . '%');
        }
    
        $guru = $guru->paginate(10);
    
        return view('dashboard.guru.all', [
            "title" => "Guru",
            "guru" => $guru,
            "kelas" => Kelas::all()
        ]);
    }

    public function show($guru) {
        return view('dashboard.guru.detail', [
            "title" => "detail.guru",
            "guru" => Guru::find($guru)
        ]);
    }

    public function create(guru $guru) {
        return view('dashboard.guru.create', [
            "title" => "Guru",
            "kelas" => Kelas::all(),
            "guru" => $guru
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'kelas_id' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
    ]);

    $existingGuru = Guru::where('nama', $request->nama)
                               ->first();

    if ($existingGuru) {
        return redirect()->back()->with('error', ' Nama sudah terdaftar. Silakan gunakan Nama yang berbeda.');
    }

    try {
        Guru::create($request->all());

        return redirect('/dashboard/guru')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
    }
}


    public function destroy($guru)
    {
        try {
            $guruModel = Guru::findOrFail($guru);
            $guruModel->delete();

            return redirect('/dashboard/guru')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/dashboard/guru')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $guru = guru::findOrFail($id);
        return view('guru.edit', [
            "title" => "Guru",
            "guru" => $guru,
            "kelas" => Kelas::all(),
        ]);
    }

    public function update(Request $request, $guru)
{
    $request->validate([
        'nama' => 'required',
        'kelas_id' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
    ]);

    try {
        $guruModel = Guru::findOrFail($guru);

        // $existingStudent = Student::where('nis', $request->nis)
        //                            ->orWhere('nama', $request->nama)
        //                            ->where('id', '!=', $studentModel->id)
        //                            ->first();

        // if ($existingStudent) {
        //     return redirect()->back()->with('error', 'NIS atau Nama sudah terdaftar. Silakan gunakan NIS atau Nama yang berbeda.');
        // }

        $guruModel->update($request->all());

        return redirect('/dashboard/guru')->with('success', 'Data berhasil diedit!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal mengedit data. Silakan coba lagi.');
    }
}

public function filter($kelas_id)
{
    $kelas = Kelas::find($kelas_id);
    if (!$kelas) {
        return redirect()->back()->with('error', 'Kelas tidak ditemukan.');
    }

    $dataFilter = Guru::where('kelas_id', $kelas_id)->paginate(10);

    return view('dashboard.guru.all', [
        "title" => "Guru",
        "guru" => $dataFilter,
        "kelas" => Kelas::all()
    ]);
}

}
