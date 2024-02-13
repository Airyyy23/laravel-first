@extends('layouts.main')

@section('content')
    <h2>Edit Data Siswa</h2>

    <form action="/student/update/{{ $student->id }}" method="POST">
         @csrf
         @method('PUT')
         <div class="form-group">
            <label for="">NIS</label>
            <input type="text" class="form-control" name="nis" id="nis" value="{{ $student->nis }}" required>
         </div>
         <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $student->nama }}" required>
         </div>
         <div class="form-group">
            <label for="">Kelas</label>
            <select class="form-select" name="kelas_id" id="kelas_id">
               @foreach ($kelas as $grade)
                   <option value="{{ $grade->id }}" {{ $student->kelas_id == $grade->id ? 'selected' : '' }}>
                       {{ $grade->nama }}
                   </option>
               @endforeach
           </select>           
         </div>
         <div class="form-group">
            <label for="">Tanggal lahir</label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $student->tanggal_lahir }}" required>
         </div>
         <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $student->alamat }}" required>
         </div>
         <div class="text-center"> 
            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
         </div>
      </form>

    @endsection