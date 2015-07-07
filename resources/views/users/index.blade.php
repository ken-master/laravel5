@extends('layout')



@section('content')
<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">User Management</h3>
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">

               

                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#id</th>
                      <th>Full Name</th>
                      <th>Roles</th>
                      <th class="pull-right">Action</th>
                    </tr>

                    @foreach($data as $user)
                    <tr>
                      <td>{{ $user->id  }}.</td>
                      <td>{{ $user->name }}</td>
                      <td>
                        Administrator
                      </td>
                      <td>
                      	<div class="btn-group pull-right">
	                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
	                   		<ul class="dropdown-menu">
	                        <li><a href="{{ route('user.show', $user->id) }}">View</a></li>
	                        <li><a href="{{ route('user.edit', $user->id) }}">Edit</a></li>
	                        <li class="divider"></li>
	                        <li><a href="{{ route('user.destroy', $user->id) }}">Remove</a></li>
	                      </ul>
	                    </div>            		
	                   </td>
                    </tr>
                   	@endforeach
                   


                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">57</a></li>
                    <li><a href="#">58</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div><!-- /.box -->
	 
    

@endsection


@section('footer_scripts')
              
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script src="/dist/js/app.min.js" type="text/javascript"></script>
    

    <script src='/plugins/fastclick/fastclick.min.js'></script>

	
@endsection