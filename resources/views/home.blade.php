@extends('layouts.app')

@section('content')
<section class="container">

    <div class="container-fluid">
       
    
  
        <div class="card">
      <!-- Card header part -->
        <div class="card-header">

        <ol class="breadcrumb">
               <li> <a href="dashboard.php"> {{ __('Dashboard  ') }} </a></li>
               <li class="active">Home</li>
         </ol> 

        </div>
     <!-- end of Card header -->

        <!-- Content section  -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                        <!-- Second Row Here -->

                        <div class="row">
                        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <a href="{{route('category.index')}}"> 
        <div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <br>
        <div class="color-name">MANAGE CATEGORY</div>
        <div class="color-name"></div>
        <div class="color-name">
        <i class="material-icons">people</i>
        </div>
        <div class="color-class-name">
            Total (3) Categories
        </div>
        </div>
        </a>
        </div>
  

   
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="{{route('radio.index')}}" class="col-lg-4"> 
            <div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br>
            <div class="color-name">MANAGE RADIO</div>
            <div class="color-name"></div>
            <div class="color-name">
            <i class="material-icons">radio</i>
            </div>
            <div class="color-class-name">
                Total (3) Radios
            </div>
            </div>
            </a>
            </div>



                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                <div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
                <div class="color-name">MANAGE ADS</div>
                <div class="color-name"></div>
                <div class="color-name">
                <i class="material-icons">monetization_on</i>
                </div>
                <div class="color-class-name">
                    Total (3) Radios
                </div>
                </div>
                </div>



                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

<div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
<br>
<div class="color-name">PUSH NOTIFICATION</div>
<div class="color-name"></div>
<div class="color-name">
<i class="material-icons">notifications</i>
</div>
<div class="color-class-name">
Notify your Users
</div>
</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<a href="{{route('admin.index')}}" class="col-lg-4"> 
<div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
<br>
<div class="color-name">ADMINISTRATOR</div>
<div class="color-name"></div>
<div class="color-name">
<i class="material-icons">people</i>
</div>
<div class="color-class-name">
Admin Panel Privileges
</div>
</div></a>
</div>




<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
<a href="{{route('setting.index')}}" class="col-lg-4"> 
<div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
<br>
<div class="color-name">SETTINGS</div>
<div class="color-name"></div>
<div class="color-name">
<i class="material-icons">settings</i>
</div>
<div class="color-class-name">
Key and Privacy Settings
</div>
</div></a>
</div>

<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
<a href="{{route('role.index')}}" class="col-lg-4"> 
<div class="card demo-color-box bg-blue waves-effect col-lg-12 col-md-12 col-sm-12 col-xs-12">
<br>
<div class="color-name">ROLES</div>
<div class="color-name"></div>
<div class="color-name">
<i class="material-icons">settings</i>
</div>
<div class="color-class-name">
Set Administration Roles
</div>
</div></a>
</div>


</div>


                        <!-- End of second Row -->

                </div>
                <!-- end of Content  -->
           </div> 

    </div>
</section>
@endsection
