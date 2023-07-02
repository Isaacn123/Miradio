<form action="{{ route('profiles.update',$profile) }}" id="editProfileform" method="post" enctype="multipart/form-data" >

@csrf

@method('PUT')

<input  name="roleid" value="" type="hidden" class="form-control" id="roleid">

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="deleteModalLabel">Create Response</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
 
      <div class="card-body">

   <div class="form-row">
       <div class="form-group">
          <div class="form-group col-md-6">
              <label for="firstname">FirstName</label>
              <!-- {{isset($category) ? $category->slug : ''}} -->
              <input type="text" id="firstname" value="{{$profile->firstname ==null ? '' : $profile->firstname}}" placeholder="{{$profile->firstname ==null ? 'Enter your first name' : ''}}" name="firstname" class="form-control">
        
         </div>
        <div class="form-group col-md-6">
          <label for="lastname">LastName</label>
          <input type="text" id="lastname" value="{{$profile->lastname ==null ? '' : $profile->lastname}}" placeholder="{{$profile->lastname ==null ? 'Enter your last name' : ''}}" name="lastname" class="form-control">
          </div>
        </div>
    </div>

    <div class="form-row">
       <div class="form-group">
          <div class="form-group col-md-6">
              <label for="country">Country</label>
              <input type="text" id="country" value="{{$profile->country ==null ? '' : $profile->country}}" placeholder="{{$profile->country ==null ? 'Enter your country' : ''}}" name="country" class="form-control">
        
         </div>
        <div class="form-group col-md-6">
          <label for="occupation">Occupation</label>
          <input type="text" id="occupation" value="{{$profile->occupation ==null ? '' : $profile->occupation}}" placeholder="{{$profile->occupation ==null ? 'Occupation' : ''}}" name="occupation" class="form-control">
          </div>
        </div>
    </div>
  
     <div class="form-group extra_padding">
                <label for="email">Email</label>
                <input  name="email" value="{{ Auth::user()->email }}" class="form-control" id="email">
     </div>
      <div class="form-group extra_padding">
     
     <label for="phone">Phone</label>
         <input  name="phone" value="{{$profile->phone ==null ? '' : $profile->phone}}" placeholder="{{$profile->phone ==null ? 'Enter Phone Number' : ''}}" class="form-control" id="phone">
     </div>

     <div class="form-group extra_padding">
     <label for="date_of_birth">Birthday</label>
     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input type="text" name="training_start_date" value="{{old('training_start_date')}}" class="form-control pull-right" placeholder=" Start Date" id="datepicker"> -->
                  <input id="datepicker"  name="date_of_birth" value="{{$profile->date_of_birth ==null ? '' : $profile->date_of_birth}}" placeholder="{{$profile->date_of_birth ==null ? 'Enter Date of Birth' : ''}}" class="form-control" id="date_of_birth">
                </div>
      
     </div>

     <div class="form-group extra_padding">
         <label for="mobile">Mobile</label>
         <input type="text" id="mobile" value="{{$profile->mobile ==null ? '' : $profile->mobile}}" placeholder="{{$profile->mobile ==null ? 'Mobile Number' : ''}}" name="mobile" class="form-control">
     </div>

  
     <div class="input-group extra_padding">
    <label class="input-group-addon"  for="profile_file">CHANGE PROFILE PICTURE</label>
     <input type="file" name="profile_file" class="form-control" id="profile_file">
    </div>

                                
    </div>
      <!-- </form> -->

    </div>
    <div class="modal-footer">
      <button type="button"  class="btn btn-secondary" data-dismiss="modal">Go Back</button>
      <button type="submit" class="btn btn-primary">update</button>
    </div>
  </div>

</div>


</div>

</form>