@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
    <div class="h1">Create Albums</div>
    </div>

    <div class="card-body">
    <h5 class="card-title">Name</h5>

     <form method="POST" action="{{ route('albums.store') }}">
        @csrf
     <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="material-icons">album</i></span>
  <input type="text" class="form-control" name='title' placeholder="Album Name" aria-label="Album Name" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1"><i class="material-icons">playlist_add_check_circle</i></span>
  <input type="text" class="form-control" name='artist' placeholder="Artist Name" aria-label="Artist Name" aria-describedby="basic-addon1">
</div>

<label for="input5" class="form-label">Description</label>
<!-- <input type="text" id="input5" class="form-control input-lg" aria-describedby="HelpBlock"> -->
<textarea class="form-control" name="description" placeholder="Describe your Music" id="exampleFormControlTextarea1" rows="3"></textarea>
<div id="passwordHelpBlock" class="form-text">
  You can provide a short description of your Album Music  about 1-2  paragraphs long.
</div>

    <button type="submit" class="btn btn-primary">Create Now</button>
     </form>
    </div>
</div>

@endsection