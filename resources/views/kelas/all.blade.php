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
          <th scope="col">Nama</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
         @php
            $no = 1;
         @endphp
        @foreach ($kelas as $kelas)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $kelas->nama }}</td>
          <td>
            <a href="/kelas/edit/{{ $kelas->id }}" class="btn btn-warning">Edit</a>
            <form action="/kelas/destroy/{{ $kelas->id }}" method="POST" style="display: inline;">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

   <a href="/kelas/create" class="btn btn-primary" role="button">Tambah Data Baru</a>
@endsection