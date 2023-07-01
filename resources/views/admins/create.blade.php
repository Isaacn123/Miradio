@extends('layouts.app')

@section('content')


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <form id="form_validation" action="{{ isset($user) ? route('admin.update', $user->id) : route('admin.store')}}" method="post">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                        @endif
                    <div class="card">
                        <div class="header">
                            <h2>{{isset($user) ? 'EDIT ADMINISTRATOR' : 'CREATE ADMINISTRATOR'}}</h2>
                          
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                
                                <div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-line">
                                            <div class="font-12">Username</div>
                                            <input type="text" class="form-control" name="username" value="{{isset($user) ? $user->username : ''}}" {{ isset($user)  ? 'disabled' : 'required' }} />

                                            <!-- <input type="hidden" class="form-control" value="{{isset($user) ? $user->username : ''}}" name="username" id="username" /> -->
                                            <!-- <label class="form-label">Username</label> -->
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="form-line">
                                            <div class="font-12">Full Name</div>
                                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{isset($user) ? $user->name : ''}}" />
                                            <!-- <label class="form-label">Username</label> -->
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <div class="form-line">
                                            <div class="font-12">Email</div>
                                            <input type="email" class="form-control"  value="{{isset($user) ? $user->email : ''}}" name="email" id="email" />
                                            <!-- <label class="form-label">Email</label> -->
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-line">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Role:</strong>
                                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                                </div>
                                            </div>
                                           
                                           
                                    </div>

                                    <div class="form-group form-float col-sm-12">
                                        <div class="form-line">
                                            <input type="password" class="form-control" value="{{isset($user) ? $user->password : ''}}"  name="password" id="password" {{ isset($user)  ? '' : 'required' }}/>
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float col-sm-12">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="repassword" id="repassword"  {{ isset($user)  ? '' : 'required' }}/>
                                            <label class="form-label">Re Password</label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="role" id="role" value="" />

                                    <div class="col-sm-12">
                                         <button class="btn bg-blue waves-effect pull-right" type="submit" name="btnEdit"> {{isset($user) ? 'UPDATE' : 'SUBMIT'}}</button>
                                    </div>

                                   
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
@endsection