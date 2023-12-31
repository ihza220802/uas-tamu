<?php use App\Models\User; ?>
@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif
<div class="text-end mb-2">
  <a class="btn btn-primary" href="{{ route('departement.export-pdf') }}"> EXPORT PDF</a>
  <a class="btn btn-primary" href="{{ route('departements.create') }}"> CREATE DEPARTEMENT</a>
</div>

<table id="example" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Location</th>
      <th scope="col">Manager Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!-- @php $no = 1 @endphp -->
    @foreach ($departements as $data)
    <tr>
      <td>{{ $data -> id}}</td>
      <td>{{ $data->name }}</td>
      <td>{{ $data->location }}</td>
      <td>{{
          (isset($data->getManager->name)) ?
          $data->getManager->name :
          'Tidak Ada'        
      }}</td>
      <td>
        <form action="{{ route('departements.destroy',$data->id) }}" method="Post">
          <a class="btn btn-primary" href="{{ route('departements.edit',$data->id) }}">Edit</a>
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
<script>$(document).ready(function () {
    $('#example').DataTable();
});</script>
@endsection