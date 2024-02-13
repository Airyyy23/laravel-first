@extends('layouts.main')

@section('content')
    <h2>Detail Siswa</h2>
    <div class="form">
        <div class="form-group">
            <label for="">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" disabled>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $student->nama }}" disabled>
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <input type="text" class="form-control" name="kelas" id="kelas" value="{{ $student->kelas->nama }}" disabled>
        </div>
        <div class="form-group">
            <label for="">Tanggal lahir</label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $student->tanggal_lahir }}" disabled>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $student->alamat }}" disabled>
        </div>
        <div class="text-center"> 
        <a href="/student/all" class="btn btn-primary btn-lg">Back</a>
    </div>
    </div>

    @endsection