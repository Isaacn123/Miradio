@extends('layouts.app')

@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form method="post" action="{{App\Models\Setting::first() ? route('setting.update',App\Models\Setting::first()->id)  : route('setting.store') }}" enctype="multipart/form-data">
                   
                        @csrf
                        @if(isset(App\Models\Setting::first()->id))
                        @method('PUT')
                        @endif
   
                    <div class="card">
                        <div class="header">
                            <h2>SETTINGS</h2>
                            <div class="header-dropdown m-r--5">
                                <button type="submit" name="submit" class="btn bg-blue waves-effect">Save Settings</button>
                            </div>
                                <?php// if(isset($_SESSION['msg'])) { ?>
                                    <!-- <br><div class='alert alert-info'>Successfully Saved...</div> -->
                                    <?php// unset($_SESSION['msg']); } ?>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                            <div class="col-sm-12">    
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>applicationId (Package Name)</b>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#modal-package-name">What is my package name?</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">applicationId (Package Name)</div>
                                            <input type="text" class="form-control" value="{{App\Models\Setting::first()->id ? App\Models\Setting::first()->package_name :'' }}" name="package_name" id="package_name" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>Site Protocol</b>
                                        <br>
                                        <font color="#337ab7">Choose your website protocol type</font>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">Protocol Type</div>
                                                <select class="form-control show-tick" name="protocol_type" id="protocol_type">
                                                       <!-- if ($settings_row['protocol_type'] == 'http://') { ? -->
                                                            <!-- <option value="http://" selected="selected">HTTP</option>
                                                            <option value="https://">HTTPS</option> -->
                                                         <!-- } else {  -->
                                                            <option value="http://">HTTP</option>
                                                            <option value="https://" selected="selected">HTTPS</option>
                                                        <!-- } ?>  -->
                                                </select>
                                        </div>
                                    </div>
                                </div> 
                            </div>                               

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>FCM Server Key</b>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#modal-server-key">How to obtain your FCM Server Key?</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">FCM Server Key</div>
                                            <textarea class="form-control" rows="3" name="app_fcm_key" id="app_fcm_key" required>{{App\Models\Setting::first()->id ? App\Models\Setting::first()->app_fcm_key :'' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>OneSignal APP ID</b>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#modal-onesignal">Where do I get my OneSignal app id?</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">OneSignal APP ID</div>
                                            <input type="text" class="form-control" name="onesignal_app_id" id="onesignal_app_id" value="{{App\Models\Setting::first()->id ? App\Models\Setting::first()->onesignal_app_id :'' }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>OneSignal Rest API Key</b>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#modal-onesignal">Where do I get my OneSignal Rest API Key?</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">OneSignal Rest API Key</div>
                                            <input type="text" class="form-control" name="onesignal_rest_api_key" id="onesignal_rest_api_key" value="{{App\Models\Setting::first()->id ? App\Models\Setting::first()->onesignal_rest_api_key :'' }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>Your API Key</b>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#modal-api-key">Where I have to put my API Key?</a>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">API Key</div>
                                            <input type="text" class="form-control" name="api_key" id="api_key" value="{{App\Models\Setting::first()->id ? App\Models\Setting::first()->api_key :'' }}" required>
                                        </div>
                                        <br>
                                        <a href="{{route('setting.edit',App\Models\Setting::first()->id )}}" class="btn bg-blue waves-effect">Change API Key</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <b>Privacy Policy</b>
                                        <br>
                                        <font color="#337ab7">This privacy policy will be displayed in your android app</font>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    
                                    <div class="form-group">
                                        <div class="form-line">
                                            <div class="font-12">Privacy Policy</div>
                                            <textarea class="form-control" name="privacy_policy" id="privacy_policy" class="ckeditor form-control" cols="60" rows="10" required>{{App\Models\Setting::first()->id ? App\Models\Setting::first()->privacy_policy :'' }}</textarea>

                                         
                                        </div>
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
        CKEDITOR.replace( 'privacy_policy' );
    </script>

@endsection