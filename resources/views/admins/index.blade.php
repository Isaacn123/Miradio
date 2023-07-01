@extends('layouts.app')


@section('content')

<!-- @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif -->

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>MANAGE ADMINISTRATOR</h2>
                            <div class="header-dropdown m-r--5">
                                <a href="{{route('admin.create') }}"><button type="button" class="btn bg-blue waves-effect">ADD NEW ADMINISTRATOR</button></a>
                            </div>
                        </div>

                        <div class="body table-responsive">
                            
                            <form method="get">
                                <div class="col-sm-10">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="keyword" placeholder="Search by username...">
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
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>

                                                                        <tbody>

                                                                        @foreach($data as $user)
                                                                            
                                                                        <tr>
                                            <td><span class="label bg-green">admin</span></td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>

                                            <td>

                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                           <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                                            @endforeach
                                            @endif
                                            </td>

                                            <td>
                                            
                                                <div class="row">
                    <div class="col-3 p-0 mt-0">
                    <a href="{{route('admin.edit', $user->id)}}" class="btn btn-success"> <i class="material-icons">mode_edit</i></a>
                    </div>
          
              <div class="col-3 p-0 sp-1">
			  <form action="{{route('admin.destroy',$user->id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                       <button  class="btn btn-danger"><i class="material-icons">delete</i></button>
                       </div>
                    </div>
                       </form>


                                                <!-- {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy', $user->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'material-icons']) !!}
                                                {!! Form::close() !!} -->
                                                
                                                
                                            </td>
                                        </tr>

                                        @endforeach
                                                            </tbody></table>

                            <h4><div class="body right"><ul class="pagination"><li class="disabled"><a><i class="material-icons">chevron_left</i></a></li><li class="active"><a>1</a></li><li class="disabled"><a><i class="material-icons">chevron_right</i></a></li></ul><br><div class="right"><h4>( {{App\Models\User::count('id')}} )</h4></div></div></h4>
                                                    </div>
                    </div>
                </div>
            </div>

@endsection