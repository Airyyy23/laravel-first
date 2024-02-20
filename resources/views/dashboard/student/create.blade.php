@extends('layouts.maindashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4 fw-bolder">Tambah Data Siswa</h2>

        @if (session()->has('error'))
      <div class="alert alert-danger col-lg-12" role="alert">
         {{ session('error')}}
      </div>
   @endif

        <form action="/dashboard/student/add" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $student->nis }}" required>
            </div>

            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $student->nama }}" required>
            </div>

            <div class="col-md-6">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select class="form-select" id="kelas_id" name="kelas_id">
                    @foreach ($kelas as $grade)
                        <option value="{{ $grade->id }}" {{ $student->kelas_id == $grade->id ? 'selected' : '' }}>
                            {{ $grade->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}" required>
            </div>

            <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $student->alamat }}" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-md fw-medium">Simpan</button>
            </div>
        </form>
    </div>
@endsection
