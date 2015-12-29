@extends('layout')



@section('content')
<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sales List</h3>
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


                <h4 class="box-title"><a href="{{route('sales.create')}}">cCreate Sales</a></h4>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#ID</th>
                      <th>Sales</th>
                      <th>Description</th>


                      <th class="pull-right">Actions</th>
                    </tr>
                    @if( !empty($data) && !is_null($data) )
                      @foreach($data as $sales)
                      <tr>
                        <td>{{ $sales->id  }}.</td>
                        <td>{{ $sales->name  }}</td>
                        <td>{{ $sales->description  }}</td>


                        <td>
                        	<div class="btn-group pull-right">
  	                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
  	                   		<ul class="dropdown-menu">
  	                        <!-- <li><a href="{{ route('sales.show', $sales->id) }}">View</a></li> -->
                            <li><a href="{{ route('sales.show', $sales->id) }}">Show</a></li>
  	                        <li><a href="{{ route('sales.edit', $sales->id) }}">Edit</a></li>
  	                        <li class="divider"></li>

  	                        <li>
                              {!! Form::open(array('route' => array('sales.destroy', $sales->id), 'method' => 'delete')) !!}
                              <a href="javascript:void(0);" onclick="$(this).closest('form').submit();">Remove</a>
                              {!! Form::close() !!}
                            </li>

  	                      </ul>
  	                    </div>
  	                   </td>
                      </tr>
                     	@endforeach
                   @endif


                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">

                  {!! $data->render() !!}

                  <!-- <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="{{$data->url(1)}}">&laquo;</a></li>
                    <li><a href="{{ $data->previousPageUrl() }}">Prev</a></li>
                    @for ( $i = 1; $i <= $data->lastPage(); $i++ )
                      <li><a href="{{ $data->url($i) }}">{{$i}}</a></li>
                    @endfor
                    <li><a href="{{ $data->nextPageUrl() }}">Next</a></li>
                    <li><a href="{{$data->url( $data->lastPage() )}}">&raquo;</a></li>
                  </ul> -->

                </div>
</div><!-- /.box -->






@endsection


@section('footer_scripts')
              <?php
     /*
    <script src="/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

    <script src="/dist/js/app.min.js" type="text/javascript"></script>


    <script src='/plugins/fastclick/fastclick.min.js'></script>
 */ ?>

@endsection
