@extends('layouts.app')

@section('content')

<div class="card card-default">

     

<div class="card-header">
    
    {{isset($category) ? 'Edit Category' : 'Create Category'}}
</div>

<div class="card-body">

@if($errors->any())

<div class="alert alert-danger">
   <div class="list-group-item">
       <ul class="list-group">

      
       @foreach($errors->all() as $error)
       <li class="list-group text-danger">{{$error}}</li> 
    
    
       @endforeach
    </ul>
   </div>
</div>

@endif

<form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store')}}" method="post" enctype="multipart/form-data">
   <!-- @csrf -->
   @csrf
     @if(isset($category))
      <!-- {{ csrf_field() }}
      {{ method_field('PUT') }} -->
      @method('PUT')

      @endif

     <div class="form-group">
         <label for="name">Name</label>
         <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping"><i class="material-icons">category</i></span>
  <!-- <input type="text" class="form-control" placeholder="Category Name" aria-label="Category Name" aria-describedby="addon-wrapping"> -->
  <input type="text" value="{{isset($category) ? $category->category_name : ''}}" id="name" name="name" class="form-control" placeholder="Category Name" aria-label="Category Name" aria-describedby="addon-wrapping"">
</div>

     </div>
     <div class="form-group">
         <label for="slug">Slug</label>
         <!-- <input type="text" id="slug" value="{{isset($category) ? $category->slug : ''}}" name="slug" class="form-control"> -->
         <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">@</span>
  <input type="text" id="slug" value="{{isset($category) ? $category->slug : ''}}" name="slug" disabled class="form-control"> 
</div>
     </div>

     <div class="input-group mb-3">
  <input type="file" class="form-control" name="image" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">Upload Category Cover</label>
</div>
@if(isset($category))
<img src="{{$category->category_image}}"  class='avatar rounded lg' alt='Message Image' height='200px' width='250px'>
@endif
    <div class="form-group mt-2">
     <button  class="btn btn-success" >
       
         {{isset($category) ? 'Edit Category' : '  Add Category'}}
     </button>
    </div>

   </form>
</div>
</div> 



@endsection