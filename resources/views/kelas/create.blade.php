@extends('layouts.main')

@section('content')
    <h1>Tambah Data Kelas</h1>

    <form action="/kelas/add" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection