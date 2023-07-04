@extends('layouts.app')

@section('content')

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Manage Radio</h2>
                            <div class="header-dropdown m-r--5">
                                <a href="{{route('radio.create')}}"><button type="button" class="btn bg-blue waves-effect">ADD NEW RADIO</button></a>
                            </div>
                            <br>
                        </div>

                        <div class="body table-responsive">
	                        
	                        <form method="get">
	                        	<div class="col-sm-10">
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" class="form-control" name="keyword" placeholder="Search by title...">
										</div>
									</div>
								</div>
								<div class="col-sm-2">
					                <button type="submit" name="btnSearch" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="material-icons">search</i></button>
								</div>
							</form>
										
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>Radio Name</th>
										<th>Radio Image</th>
										<th>Radio Stream Url</th>
										<th>Category</th>
										<th><center>Featured</center></th>
										<th><center>Action</center></th>
									</tr>
								</thead>

																		<tbody>
                                                                        @foreach($radios as $radio)    
                                                                        <tr>
											<td>{{$radio->radio_name}} </td>
							            	<td><img src="{{$radio->radio_image}}" height="48px" width="48px"></td>
											<td>
												{{$radio->radio_url}}									</td>
											<td> {{ App\Models\Category::find($radio->category_id)->category_name }}</td>
											<td align="center">
							            	<!-- <a href="manage-radio.php?remove=44" onclick="return confirm('Remove from featured radio?')">
                                            <i class="material-icons" style="color:#4bae4f">lens</i></a> -->

											<div class="custom-control custom-switch">
               
			   <input data-id="{{$radio->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $radio->featured ? 'checked' : '' }}>
			   </div>


							            									            	</td>

											<td><center>

									            <a href="{{route('radio.edit', $radio->id)}}">
									                <i class="material-icons">mode_edit</i>
									            </a>
									                        
									            <a href="{{ route('radio.destroy',$radio->id)}}" onclick="return confirm('Are you sure want to delete this radio?')">
									                <i class="material-icons">delete</i>
									            </a></center>
									        </td>

										</tr>
                                        @endforeach
															</tbody></table>

							<h4><div class="body right"><ul class="pagination"><li class="disabled"><a><i class="material-icons">chevron_left</i></a></li><li class="active"><a>1</a></li><li class="disabled"><a><i class="material-icons">chevron_right</i></a></li></ul><br><div class="right"><h4>( {{ \App\Models\Radio::sum('id') }} )</h4></div></div></h4>
													</div>
                    </div>
                </div>
            </div>




            @endsection



			@section('scripts')

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 

        // console.log(id);
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatusrad',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endsection