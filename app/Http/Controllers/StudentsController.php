<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        return view('./student/all', [
            "title" => "student",
            "students" => Student::all()
        ]);
    }

    public function show($student) {
        return view('student.detail', [
            "title" => "detail.student",
            "student" => Student::find($student)
        ]);
    }

    public function create(Student $student) {
        return view('student.create', [
            "title" => "create.student",
            "kelas" => Kelas::all(),
            "student" => $student
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        try {
            Student::create($request->all());
    
            return redirect('/student/all')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }
    }

    public function destroy($student)
    {
        try {
            $studentModel = Student::findOrFail($student);
            $studentModel->delete();

            return redirect('/student/all')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect('/student/all')->with('error', 'Gagal menghapus data. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', [
            "title" => "Edit Siswa",
            "student" => $student,
            "kelas" => Kelas::all(),
        ]);
    }

    public function update(Request $request, $student) {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required',
            'kelas_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
        ]);

        try {
            $studentModel = Student::findOrFail($student);
            $studentModel->update($request->all());
            
            return redirect('/student/all')->with('success', 'Data berhasil diedit!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data. Silakan coba lagi.');
        }
    }
}
