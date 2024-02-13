@extends('layouts.main')

@section('content')
    <h1>Edit Data Kelas</h1>

    <form action="/kelas/update/{{ $kelas->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $kelas->nama }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection