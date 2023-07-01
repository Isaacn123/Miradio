
@extends('layouts.app')


@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="header">
                                <h2>CHANGE API KEY</h2>
                                <div class="header-dropdown m-r--5">
                                    <button type="submit" name="submit" class="btn bg-blue waves-effect" onclick="return confirm('Are you sure want to update API Key?')">Update API Key</button>
                                </div>
                              
                                <?php

function generate_password($chars = 45) {
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($characters), 0, $chars);
}

$random_api_key = generate_password();


?>

                                </div>

                            <div class="body">

                                <div class="row clearfix">
                                <div class="col-sm-10">
                                            
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <div class="font-12">Change API Key</div>
                                                    <input type="text" class="form-control" name="api_key" id="api_key" value="cda11<?php echo $random_api_key;?>" required />
                                                   </div>
                                               </div>
                                           </div>
</div>
                               
                                    <div class="col-sm-2">
                                        <a class="btn bg-blue waves-effect" href="{{route('changeapi')}}">Generate</a>
                                        <!-- <a href="<?php //generate_password() ?>" > generate</a> -->
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

@endsection