@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Anggota
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('anggota.update', $anggota->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label >Nama:</label>
          <input type="text" class="form-control" name="nama" value={{ $anggota->nama }} />
        </div>
        <div class="form-group">
          <label >Umur :</label>
          <input type="number" class="form-control" name="umur" value={{ $anggota->umur }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection