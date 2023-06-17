@extends('layouts.app')

@section('content')
<?php
// dd( $album->id);
?>
<div class="card">
    <div class="card-header">
    <div class="h1">Create Albums</div>
    </div>

    <div class="card-body">
    <h5 class="card-title">Name</h5>

     <form method="POST" action="{{ route('songs.store', $album->id) }}" enctype="multipart/form-data">
        @csrf

     <div class="input-group mb-3">
  <!-- <span class="input-group-text" id="basic-addon1"><i class="material-icons">Song Album</i></span> -->
  <input type="text" class="form-control" name='title' placeholder="Audio Name" aria-label="Album Name" aria-describedby="basic-addon1">
</div>

<h5 class="card-title">Audio File</h5>

<div class="input-group">
<!-- <span class="input-group-text" id="basic-addon1"><i class="material-icons">File</i></span> -->
  <input type="file" accept=".mp3" class="form-control" name="audio" id="audio" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
</div>

    <button type="submit" class="btn btn-primary">Create Now</button>
    
     </form>
    </div>
</div>

@endsection