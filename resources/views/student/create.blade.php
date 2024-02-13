@extends('layouts.main')

@section('content')
    <h1>Tambah Data Siswa</h1>

    <form action="/student/add" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nis" class="form-label">nis</label>
            <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">kelas</label>
            <select class="form-select" name="kelas_id" id="">
                @foreach ($kelas as $grade)
                    <option name="kelas_id" value="{{ $grade->id }}">{{ $grade->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
         <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
         <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
     </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection