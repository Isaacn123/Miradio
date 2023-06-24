
@extends('layouts.app')

@section('content')
<div class="card">
<div class="card-header">
    <div class="h1">{{$message->title }}</div>
    </div>

    <div class="card-body">
        <div class="container">
            <form method="POST" action="{{ route('message.upload', $message->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="input-group">
  <input type="file" accept=".png,.jpg" class="form-control" name="image" id="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
</div>

   <button class="btn btn-outline-secondary btn-dark" id="inputGroupFileAddon04">Update Message Cover</button>
            </form> 
         </div>
    </div>
    <div class="mt-4">
       @if($photo)
      <img src="{{$photo->file_url }}"  width="300" height="220"/>
       @endif

    </div>

    <div class="container">
    <div class="row py-2" >
    <div class="col-6 ">Messages</div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('audios.create', $message->id) }}" class="btn btn-success mt-6 ">Add Audio {{$message->id}}</a>
    </div>
</div>
</div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="table-secondary">  
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>active</th>
                  <th>Manange</th>
                </tr>
              </thead>
              <tbody>
                @foreach($audios as $audio)
                <tr>
                  <td>{{$audio->id}}</td>
                  <td><a href="{{ route('message.show', $audio->id)}}">{{$audio->audio_title}}</a></td>
                  <td>1</td>
                  <td>
                    <div class="row">
                    <div class="col-3 p-0 mt-0">
                    <a href="{{ route('message.edit', 1)}}" class="btn btn-success">Edit</a>
                    </div>
          
              <div class="col-3 p-0 mt-0">
                      <form action="{{ route('message.destroy', 1) }}" method="POST">
                       
                       @csrf
                       @method('DELETE')
                       <button  class="btn btn-danger">Delete</button>
                       </form>

              </div>
                    </div>
                 
                
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</div>
@endsection