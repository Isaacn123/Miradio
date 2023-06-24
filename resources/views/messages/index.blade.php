@extends('layouts.app')

@section('content')

<div class="h4">Messages </div>

<div class="container mx-auto">


<div class="container">
<div class="row py-2" >
    <div class="col-6 ">Messages</div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('message.create') }}" class="btn btn-success mt-6 ">Create Message</a>
    </div>
</div>
</div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead class="table-secondary">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Message Cover</th>
                  <th>Category</th>
                  <th>Edit Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($messages as $message)
                <tr>
                
           

                  <td>{{$message->id}}</td>
                  <td><a href="{{ route('message.show', $message->id)}}">{{$message->title}}</a></td>
                  <td>
  
      <img src="{{$message->image_cover}}" 
      class="rounded-circle" style="width: 40px;"  alt="Avatar" />
    </td>
                  <td>
                 
                  {{ App\Models\Category::find($message->cid)->category_name }}
                  </td>
                  <td>
                    <div class="row">
                    <div class="col-3 p-0 mt-0">
                    <a href="{{ route('message.edit', $message->id)}}" class="btn btn-success">Edit</a>
                    </div>
          
              <div class="col-3 p-0 mt-0">
                      <form action="{{route('message.destroy',$message->id)}}" method="POST">
                       
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