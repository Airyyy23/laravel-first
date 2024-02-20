@extends('layouts.maindashboard')

@section('content')
    <h2 class="mb-4 fw-bolder">Tambah Data Kelas</h2>

    <form action="/dashboard/kelas/add" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="nama" class="form-label">Kelas</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="col-md-6">
            <label for="guru_id" class="form-label">Wali Kelas</label>
            <select class="form-select" id="guru_id" name="guru_id">
                @foreach ($guru as $guru)
                    <option value="{{ $guru->id }}" {{ $kelas->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection