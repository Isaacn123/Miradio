@extends('layouts.app')

@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MANAGE SOCIAL</h2>
                            <div class="header-dropdown m-r--5">
                                <a href="{{route('social.create')}}"><button type="button" class="btn bg-blue waves-effect">ADD NEW SOCIAL</button></a>
                            </div>
                        </div>

                        <div class="body table-responsive">
										
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Name</th>
										<th>Icon</th>
										<th>Url</th>
										<th width="15%">Action</th>
									</tr>
								</thead>

																		<tbody>
											@foreach($socials as $social)
                                          <tr>
											<td>{{$social->name}}</td>
											<td><img src="{{$social->icon}}" width="28px" height="28px"></td>
											<td>{{$social->url}}</td>
											<td>
									            <!-- <a href="{{route('social.edit',$social->id) }}">
									                <i class="material-icons">mode_edit</i>
									            </a> -->
									                        
									            <!-- <a href="{{route('social.destroy',$social->id) }}">
									                <i class="material-icons">delete</i>
									            </a> -->

						


					   <div class="row">
                    <div class="col-3 p-0 mt-0">
                    <a href="{{ route('social.edit', $social->id) }}" class="btn btn-success"> <i class="material-icons">mode_edit</i></a>
                    </div>
          
              <div class="col-3 p-0 sp-1">
			  <form action="{{route('social.destroy',$social->id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                       <button  class="btn btn-danger"><i class="material-icons">delete</i></button>
                       </div>
                    </div>
                       </form>
									        </td>
										</tr>

										@endforeach
											
                                      
										<!-- <tr>
											<td>Instagram</td>
											<td><img src="upload/social/1602600239_ig.png" width="28px" height="28px"></td>
											<td>https://www.instagram.com/</td>
											<td>
									            <a href="edit-social.php?id=3">
									                <i class="material-icons">mode_edit</i>
									            </a>
									                        
									            <a href="manage-social.php?id=3" onclick="return confirm('Are you sure want to delete this social?')">
									                <i class="material-icons">delete</i>
									            </a>
									        </td>
									 	</tr> -->
										
									</tbody></table>

						</div>
                    </div>
                </div>
            </div>
@endsection