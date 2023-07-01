@extends('layouts.app')



@section('content')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form id="form_validation"action="{{ isset($social) ? route('social.update', $social->id) : route('social.store')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($social))
                        @method('PUT')
                        @endif
   
                    <div class="card">
                        <div class="header">
                            <h2> {{isset($social) ? 'EDIT SOCIAL' : 'ADD SOCIAL'}}</h2>
                            <div class="header-dropdown m-r--5">
                                <button type="submit" name="submit" class="btn bg-blue waves-effect pull-right">{{isset($social) ? 'UPDATE ' : 'PUBLISH'}}</button>
                            </div>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                
                                <div>

                                    <div class="form-group form-float col-sm-12">
                                        <div class="font-12">Name *</div>
                                        <div class="form-line">
                                            <input type="text"  value="{{isset($social) ? $social->name : ''}}" class="form-control" name="name" id="name" placeholder="Name" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-line">
                                            <div class="font-12 ex1">Icon ( jpg / png ) *</div>
                                            <input type="file" name="icon" id="icon" class="dropify-image" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div id="selectedBanner"></div>
                                    @if(isset($social))
<img src="{{$social->icon}}"  class='avatar rounded lg' alt='Social  Icon' width="28px" height="28px">
@endif
                                    </div>
                                    
                                    <div class="form-group form-float col-sm-12">
                                        <div class="font-12">Url *</div>
                                        <div class="form-line">
                                            <input type="text" value="{{isset($social) ? $social->url : ''}}"  class="form-control" name="url" id="url" placeholder="Url" required>
                                        </div>
                                    </div>

                                </div>
                                    
                            </div>
                        </div>
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