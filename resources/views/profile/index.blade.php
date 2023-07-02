@extends('layouts.app')
@section('content')

<div class="content-wrapper">

<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                <!-- asset('dist/img/avator_profile.png') -->
                  <!-- profile.jpeg -->
                
                 <img width="100%"  height="80px" class="img-fluid" src="https://res.cloudinary.com/padshare/image/upload/v1659459017/Profile/user_1659459015.png"/>
                  <!-- <img class="img-fluid" src="{{$profile->photoUrl ==null ? 'https://res.cloudinary.com/padshare/image/upload/v1659459017/Profile/user_1659459015.png' : $profile->photoUrl}}" alt=""> -->
              </a>
              <h1>{{ Auth::user()->name }}</h1>
              <p>{{ Auth::user()->email }}</p>
          
          </div>
        

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"><i class="fa fa-calendar"></i> Recent Activity <span class="label label-warning pull-right r-activity">9</span></a></li>
              <li><a onclick="getprofile({{Auth::user()->id}})" href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">

      <div class="panel">
          <div class="bio-graph-heading">
              Member of Miracle Centre Cathedral. in association with Highway of Holiness...
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: {{$profile->firstname ==null ? '' : $profile->firstname}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: {{$profile->lastname ==null ? '' : $profile->lastname}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Country </span>: {{$profile->country ==null ? '' : $profile->country}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Birthday</span>: {{$profile->date_of_birth ==null ? '' : $profile->date_of_birth}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>: {{$profile->occupation ==null ? '' : $profile->occupation}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: {{ Auth::user()->email }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Mobile </span>: {{$profile->mobile ==null ? '' : $profile->mobile}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Phone </span>:{{$profile->mobile ==null ? '' : $profile->mobile}}</p>
                  </div>
              </div>
          </div>
      </div>
      <div>
          <div class="row">
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;">
                              <canvas width="100" height="100px"></canvas>
                              <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="0" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="red">Project Completed</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;">
                              <canvas width="100" height="100px"></canvas>
                              <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="0" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="terques">Not Completed</h4>
                              <p>Started : 15 July</p>
                              <p>Deadline : 15 August</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>

@include('profile.edit');

@endsection



@section('scripts')
<script>
function getprofile(id){
$('#editProfileModal').modal('show');
console.log("Profile");
console.log('id: ' + id);

$.ajax({ 
    type:'GET',
    url:'/userprofile/'+ id,
    success:function(data){
        console.log("MODEL EDIT" + data);
        // $('#roleid').val(data.result.id);
        // $('#rolename').val(data.result.name);
    }
})

}

$(function(){
    $('#datepicker').datepicker({
        autoclose: true
    })
})

// $(document).ready(function () {
//             $('#selectDate').datepicker({
//                 dateFormat: 'dd/mm/yy', // set date format as you prefer
//                 changeMonth: true, // if you want to change months
//                 changeYear: true,  // if you want to change years
//                 yearRange: "-50:+10",
//                 clickInput: true,

//                 onSelect: function (date) {
//                     $('#selectName').val(date).attr('readonly', true); // if you want to make event fire after the date selection
//                 }

//             });
//         });
</script>
@endsection