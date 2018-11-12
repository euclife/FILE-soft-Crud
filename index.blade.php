@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{route('anggota.create')}}" class="btn btn-primary">Tambah</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nama</td>
          <td>Umur</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $aggo)
        <tr>
            <td>{{$aggo->id}}</td>
            <td>{{$aggo->nama}}</td>
            <td>{{$aggo->umur}}</td>
            <td><a href="{{ route('anggota.edit',$aggo->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('anggota.destroy', $aggo->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection