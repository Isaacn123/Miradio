@extends('layouts.app')

@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                	<form id="form_validation" action="{{ isset($radio) ? route('radio.update', $radio->id) : route('radio.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                        @if(isset($radio))
                        @method('PUT')
                        @endif
   
                    <div class="card">
                        <div class="header">
                            <h2> {{isset($radio) ? 'EDIT RADIO' : 'ADD RADIO'}}</h2>
                                                        </div>
                        <div class="body">

                        	<div class="row clearfix">
                            <div>
                                    <div class="form-group form-float col-sm-12">
                                        <div class="font-12">Radio Name</div>
                                        <div class="form-line">
                                            <input type="text" class="form-control"  value="{{isset($radio) ? $radio->radio_name : ''}}" name="radio_name" id="radio_name" placeholder="Radio Name" required="" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="font-12">Category</div>
                                        <div class="btn-group bootstrap-select form-control show-tick">
                                            <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" data-id="cid" title="Culture">
                                                
                                            <span class="filter-option pull-left">Select</span>&nbsp;<span class="bs-caret">
                                                <span class="caret"></span></span></button>
                                                
                                                <div class="dropdown-menu open">
                                                  </div>
                                            
                                            <select class="form-control show-tick"  value="{{isset($radio) ? $radio->category_id : ''}}" name="cid" id="cid" tabindex="-98">
                                                @foreach($categories as $category)
                                                   <option value="{{isset($radio) ? $radio->category_id : $category->id}}">{{isset($radio) ? \App\Models\Category::find($radio->category_id)->category_name : $category->category_name}}</option>

                                                    @endforeach
                                                    </select>
                                                </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="font-12">Radio Stream Url</div>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{isset($radio) ? $radio->radio_url : ''}}" name="radio_url" id="radio_url" placeholder="ex : http://live.radiorodja.com/ or http://202.147.199.100:8000/" required="" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="font-12 ex1">Image ( jpg / png )</div>
                                    <div class="form-group">
                                        <input type="file" name="radio_image" id="img" class="dropify-image" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png gif" />
                                       
                                        <div class="div-error">
                                          
                                          </div>
                                    </div>     
                                    
                                    <div id="selectedBanner"></div>
                                    @if(isset($radio))
<img src="{{$radio->radio_image}}"  class='avatar rounded lg' alt='Radio Image' height='200px' width='250px'>
@endif
                                 

                                    <div class="col-sm-12">
                                        <p></p>
                                    <button type="submit" name="btnAdd" class="btn bg-blue waves-effect pull-right ">{{isset($radio) ? 'UPDATE' : 'SUBMIT'}}</button>
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