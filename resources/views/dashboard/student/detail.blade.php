@extends('layouts.maindashboard')

@section('content')
    <div class="container w-100">
        <h2 class="mb-4 fw-bolder">Detail Siswa</h2>
        <div class="card">
            <div class="card-body">
                <div class="form">
                    <div class="form-group mt-1">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" value="{{ $student->nis }}" disabled>
                    </div>
                    <div class="form-group mt-1">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ $student->nama }}" disabled>
                    </div>
                    <div class="form-group mt-1">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" value="{{ $student->kelas->nama }}" disabled>
                    </div>
                    <div class="form-group mt-1">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir" value="{{ $student->tanggal_lahir }}" disabled>
                    </div>
                    <div class="form-group mt-1">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="{{ $student->alamat }}" disabled>
                    </div>
                    <div class="mt-4">
                        <a href="/dashboard/student" class="btn btn-primary btn-md fw-medium">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
