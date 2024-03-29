<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        // $dataStudent = Student::paginate(10);
    
        $students = Student::latest();
    
        if (request('search')) {
            $students->where('nis', 'like', '%' . request('search') . '%')
                     ->orWhere('nama', 'like', '%' . request('search') . '%')
                     ->orWhere('alamat', 'like', '%' . request('search') . '%');
        }
    
        $students = $students->paginate(10);
    
        return view('student.all', [
            "title" => "Siswa",
            "students" => $students,
            "kelas" => Kelas::all()
        ]);
    }

    public function show($student) {
        return view('student.detail', [
            "title" => "Siswa",
            "student" => Student::find($student)
        ]);
    }

    public function create(Student $student) {
        return view('student.create', [
            "title" => "Siswa",
            "kelas" => Kelas::all(),
            "student" => $student
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'nis' => 'required|numeric',
        'nama' => 'required',
        'kelas_id' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
    ]);

    $existingStudent = Student::where('nis', $request->nis)
                               ->orWhere('nama', $request->nama)
                               ->first();

    if ($existingStudent) {
        return redirect()->back()->with('error', 'NIS atau Nama sudah terdaftar. Silakan gunakan NIS atau Nama yang berbeda.');
    }

    try {
        Student::create($request->all());

        return redirect('/student')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
    }
}


    public function destroy($student)
    {
        try {
            $studentModel = Student::findOrFail($student);
            $studentModel->delete();

            return redirect('/student')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/student')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', [
            "title" => "Siswa",
            "student" => $student,
            "kelas" => Kelas::all(),
        ]);
    }

    public function update(Request $request, $student)
{
    $request->validate([
        'nis' => 'required|numeric',
        'nama' => 'required',
        'kelas_id' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
    ]);

    try {
        $studentModel = Student::findOrFail($student);

        // $existingStudent = Student::where('nis', $request->nis)
        //                            ->orWhere('nama', $request->nama)
        //                            ->where('id', '!=', $studentModel->id)
        //                            ->first();

        // if ($existingStudent) {
        //     return redirect()->back()->with('error', 'NIS atau Nama sudah terdaftar. Silakan gunakan NIS atau Nama yang berbeda.');
        // }

        $studentModel->update($request->all());

        return redirect('/student')->with('success', 'Data berhasil diedit!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal mengedit data. Silakan coba lagi.');
    }
}

    public function filter($kelas_id)
    {
        $dataFilter = Student::where('kelas_id', $kelas_id)->paginate(10);

        return view('student.all', [
            "title" => "Siswa",
            "students" => $dataFilter,
            "kelas" => Kelas::all()
        ]);
    }

}
