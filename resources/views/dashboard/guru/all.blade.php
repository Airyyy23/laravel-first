@extends('layouts.maindashboard')

@section('content')
<div class="container">
   <div class="d-flex justify-content-between align-items-center">
      <h2 class="mb-4 fw-bolder">Daftar Guru</h2>

      <div class="d-flex gap-2">
         <div class="dropdown ms-4">
            <button class="btn btn-primary dropdown-toggle fw-medium" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filter Kelas
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/dashboard/guru') }}">Show All</a></li>
                @foreach ($kelas as $item)
                    <li><a class="dropdown-item" href="{{ url('/dashboard/guru/filter', $item->id) }}">{{ $item->nama }}</a></li>
                @endforeach
            </ul>
         </div>
      
         <form action="/dashboard/guru/search" class="w-100">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
               <button class="btn btn-primary fw-medium" type="submit">Cari</button>
            </div>
         </form>
      </div>
   </div>

   @if (session()->has('success'))
      <div class="alert alert-success col-lg-12" role="alert">
         {{ session('success')}}
      </div>
   @endif
   @if (session()->has('error'))
      <div class="alert alert-danger col-lg-12" role="alert">
         {{ session('error')}}
      </div>
   @endif

   @if($guru->count())
      <table class="table table-striped table-hover">
         <thead class="thead-dark">
            <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">Mengajar Kelas</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>
            @php
               $no = 1;
            @endphp
            @foreach ($guru as $guru)
               <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $guru->nama }}</td>
                  <td>{{ $guru->kelas->nama ?? 'Kelas Tidak Ada'}}</td>
                  <td>
                     @auth
                        <a href="/dashboard/guru/detail/{{ $guru->id }}" class="fw-semibold btn btn-primary btn-sm text-white">Detail</a>
                        <a href="/dashboard/guru/edit/{{ $guru->id }}" class="fw-semibold btn btn-warning btn-sm text-white">Edit</a>
                        <form action="/dashboard/guru/destroy/{{ $guru->id }}" method="POST" style="display: inline;">
                           @csrf
                           @method('delete')
                           <button type="submit" class="fw-semibold btn btn-danger btn-sm text-white" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                     @else
                        <a href="/dashboard/guru/detail/{{ $guru->id }}" class="fw-semibold btn btn-primary btn-sm text-white">Detail</a>
                     @endauth
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   @else
      <div class="alert alert-primary col-lg-12" role="alert">
         <h1>Tidak ada data</h1>
      </div>
   @endif
</div>

<div class="container d-flex justify-content-between align-items-start">
   @auth
      <a href="/dashboard/guru/create" class="btn btn-primary btn-md fw-medium" role="button">Tambah Data Baru</a>
   @endif
   @if($guru->count() > 10)
      <ul class="pagination">
         {{ $guru->links() }}
      </ul>
   @endif
</div>
@endsection
