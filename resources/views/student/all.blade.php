@extends('layouts.main')

@section('content')
   @if (session()->has('success'))
      <div class="alert alert-success col-lg-13" role="alert">
        {{ session('success')}}
      </div>
   @endif
   @if (session()->has('error'))
      <div class="alert alert-danger col-lg-13" role="alert">
        {{ session('error')}}
      </div>
   @endif

   <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIS</th>
          <th scope="col">Nama</th>
          <th scope="col">Kelas</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
         @php
            $no = 1;
         @endphp
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $student->nis }}</td>
          <td>{{ $student->nama }}</td>
          <td>{{ $student->kelas->nama }}</td>
          <td>
            <a href="/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
            <a href="/student/edit/{{ $student->id }}" class="btn btn-warning">Edit</a>
            <form action="/student/destroy/{{ $student->id }}" method="POST" style="display: inline;">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

   <a href="/student/create" class="btn btn-primary" role="button">Tambah Data Baru</a>
@endsection