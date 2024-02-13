@extends ('layouts.main')

@section('content')
   <table class="table table-info table-hover">
      <thead>
      <tr>
         <th scope="col">No</th>
         <th scope="col">Nama</th>
         <th scope="col">Nama Pembina</th>
         <th scope="col">Deskripsi</th>
      </tr>
      </thead>
      <tbody>
         @php
            $no = 1;
         @endphp
      @foreach ($extracurricular as $extra)
         <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $extra['nama'] }}</td>
            <td>{{ $extra['nama_pembina'] }}</td>
            <td>{{ $extra['deskripsi'] }}</td>
         </tr>
      @endforeach
      </tbody>
   </table>
@endsection