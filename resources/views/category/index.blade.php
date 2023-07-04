@extends('layouts.app')

@section('content')

<div class="h1">Categories</div>

<div class="container mx-auto">


<div class="container">
<div class="row py-2" >
    <div class="col-6 ">Albums</div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('category.create') }}" class="btn btn-success mt-6 ">Create Album</a>
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
                  <th>featured</th>
                  <th>Edit Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr>
               

                  <td>{{ $category->id}}</td>
                  <!-- "{{ route('category.show', $category->id)}}" -->
                  <td><a href="#">{{ $category->category_name}}</a></td>
                  <td>
                
                
                
      <img src="{{ $category->category_image}}" 
      class="rounded-circle" style="width: 40px;"  alt="Avatar" />

               
      

              

</td>
                  <td>
                  <!-- <button type="button" class="btn btn-info btn-circle btn-lg"><i class="glyphicon glyphicon-ok"></i></button> -->
                

                  <div class="custom-control custom-switch">
               
                  <input data-id="{{$category->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $category->featured ? 'checked' : '' }}>
                  </div>
                  </td>
                  <td>
                    <div class="row">
                    <div class="col-3 p-0 mt-0">
                    <a href="{{ route('category.edit',  $category->id)}}" class="btn btn-success">Edit</a>
                    </div>
          
              <div class="col-3 p-0 mt-0">
                      <form action="{{route('category.destroy',$category->id)}}" method="POST">
                       
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

@section('scripts')

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 

        // console.log(id);
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endsection