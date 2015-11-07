@extends('layout')



@section('content')
<div class="row">
<form role="form" action="{{{ route('access_level.store') }}}" method="POST" >
<div class="">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Access Level List</h3> - <a href="{{ route('access_level.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            

            <div class="form-group">
                <label for="full_name">Access Level Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                <input type="input" name="name" class="form-control" id="name" placeholder="Enter Access Level Name" value="{{ old('name') }}">
            </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('description') }}</span>
                <input type="input" name="description" class="form-control" id="description" placeholder="Enter Description" value="{{ old('description') }}">
            </div>
        

            @foreach( $permissions as $key => $value ) 
            <div class="col-md-3">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ ucwords( str_replace("_"," ",$key) ) }}</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">
                @foreach( $value as $v )        
                            <div>      
                            {!! Form::checkbox('permission[]', $v ) !!}
                            {{$v}}
                            </div>
                 @endforeach
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
             @endforeach









        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
       
    
    </div>
</div>




</form>
</div>
@endsection