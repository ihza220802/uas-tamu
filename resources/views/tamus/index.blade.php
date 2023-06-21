@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success  alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" 
  aria-label="Close"></button>
</div>
@endif
<div class="text-end mb-2">
<a class="btn btn-primary" href="{{ route('tamus.chartLine') }}"> Chart</a>
<a class="btn btn-primary" href="{{ route('tamus.create') }}"> Add tamu</a>
</div>
<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Tamu</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @php $no = 1 @endphp
    @foreach ($tamus as $data)
    <tr>
        <td>{{ $no ++ }}</td>
        <td>{{ $data->id_tamu }}</td>
        <td>{{ $data->tanggal }}</td>
        <td>{{ 
          (isset($data->getManager->name)) ? 
          $data->getManager->name : 
          'Tidak Ada'
          }}
        <td>{{ $data->nama_alamat }}</td>
        <td>{{ $data->detail->count() }}</td>
      
        </td>
        <td>
            <form action="{{ route('tamus.destroy',$data->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('tamus.edit',$data->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@section('js')
<script>
  $(document).ready(function () {
      $('#example').DataTable();
  });
</script>
@endsection