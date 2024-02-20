@extends('layouts.maindashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4 fw-bolder">Edit Data Kelas</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/dashboard/kelas/update/{{ $kelas->id }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nama" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kelas->nama }}" required>
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
                <button type="submit" class="btn btn-primary btn-md fw-medium">Simpan</button>
            </div>
        </form>
    </div>
@endsection
