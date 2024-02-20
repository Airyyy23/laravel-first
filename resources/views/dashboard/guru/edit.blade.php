@extends('layouts.maindashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4 fw-bolder">Edit Data Guru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/dashboard/guru/update/{{ $guru->id }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $guru->nama }}" required>
            </div>

            <div class="col-md-6">
                <label for="kelas_id" class="form-label">Mengajar Kelas</label>
                <select class="form-select" id="kelas_id" name="kelas_id">
                    @foreach ($kelas as $kelas)
                        <option value="{{ $kelas->id }}" {{ $guru->kelas_id == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}" required>
            </div>

            <div class="col-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $guru->alamat }}" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-md fw-medium">Simpan</button>
            </div>
        </form>
    </div>
@endsection
