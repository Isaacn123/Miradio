@extends('layouts.app')

@section('content')
<div class="container mx-auto">


<div class="container">
<div class="row py-2" >
    <div class="col-6 ">Albums</div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('albums.create') }}" class="btn btn-success mt-6 ">Create Album</a>
    </div>
</div>
</div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="table-secondary">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>profile</th>
                  <th>active</th>
                  <th>Edit Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($albums as $album)
                <tr>
                  <td>{{ $album->id }}</td>
                  <td><a href="{{ route('albums.show', $album->id)}}">{{ $album->title }}</a></td>
                  <td>
                
                

                    
      <img src="{{$album->url}}" 
      class="rounded-circle" style="width: 40px;"  alt="Avatar" />

               
      

              

</td>
                  <td>dolor</td>
                  <td>
                    <div class="row">
                    <div class="col-3 p-0 mt-0">
                    <a href="{{ route('albums.edit', $album->id)}}" class="btn btn-success">Edit</a>
                    </div>
          
              <div class="col-3 p-0 mt-0">
                      <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                       
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


@endsection