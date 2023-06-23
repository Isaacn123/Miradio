@extends('layouts.app')

@section('content')

<div class="h4">Create Messages</div>

<div class="card card-default">

<div class="card-header">
    {{isset($message) ? 'Edit Message' : 'Create Message'}}
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

<form action="{{ isset($message) ? route('message.update', $message->id) : route('message.store')}}" method="post" enctype="multipart/form-data">
   <!-- @csrf -->
   @csrf
     @if(isset($message))
      <!-- {{ csrf_field() }}
      {{ method_field('PUT') }} -->
      @method('PUT')

      @endif

     <div class="form-group">
         <label for="name">Message Title</label>
         <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping"><i class="material-icons">message</i></span>
  <input type="text" value="{{isset($message) ? $message->title : ''}}" id="name" name="title" class="form-control" placeholder="Message Title" aria-label="Message Name" aria-describedby="addon-wrapping">
</div>
     </div>

<label for="package_category" class="">Category</label>
            <!-- <input type="text"  aria-describedby="sizing-addon1" id="package_category" value="{{old('category')}}" name="category" placeholder=" Package Category" class="form-control input-lg"> -->
            <div class="select-form">
              <select name='categoryid' id="category" class="form-control">
                 @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                 @endforeach
              </select>
            </div>

 @if($message)
   <span class="badge text-bg-warning">
   <div class="h6 mt-2">
   {{ App\Models\Category::find($message->cid)->category_name }}
   </div>
 </span> 
 @endif
<div class="input-group mb-3 mt-3">
  <input type="file" class="form-control" name="audio_file" accept=".mp3" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">Upload Message file (mp3)</label>
</div>
@if(isset($message))

<span class="badge text-bg-info">
<div class="h4 mt-2">{{$message->stream_url}}</div>
</span>
@endif

  
     <div class="input-group mb-3 mt-3">
  <input type="file" class="form-control" name="image" accept=".png,.jpg" id="img">
  <label class="input-group-text" for="inputGroupFile02">Upload Category Cover</label>
</div>
<div id="selectedBanner"></div>

@if(isset($message))
<img src="{{$message->image_cover}}"  class='avatar rounded lg' alt='Message Image' height='200px' width='250px'>
@endif
    <div class="form-group mt-3">
     <button  class="btn btn-success" >
         {{isset($message) ? 'Edit Message' : '  Add Message'}}
     </button>
    </div>

   </form>
</div>
</div> 

@endsection


@section('scripts')
<script>

var selDiv = "";
      var storedFiles = [];
      $(document).ready(function () {
        $("#img").on("change", handleFileSelect);
        selDiv = $("#selectedBanner");
      });

      function handleFileSelect(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
        filesArr.forEach(function (f) {
          if (!f.type.match("image.*")) {
            return;
          }
          storedFiles.push(f);

          var reader = new FileReader();
          reader.onload = function (e) {
            console.log(e.target.result);
            var html =
              '<img src="' +
              e.target.result +
              "\" data-file='" +
              f.name +
              "' class='avatar rounded lg' alt='Message Image' height='200px' width='250px'>";

            selDiv.html(html);

          };
          reader.readAsDataURL(f);
        });
      }

</script>

@endsection