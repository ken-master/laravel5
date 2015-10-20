@extends('layout')



@section('content')

<form role="form" action="{{{ route('access_level.update', $access_level->id) }}}" method="POST" >
<div class="col-md-8">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit User</h3> - <a href="{{ route('access_level.index') }}">Go back</a>
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
           
<!--             <div class="form-group">
                <label for="full_name">Is Active:</label>
                {!! Form::checkbox('is_active', '1') !!}
            </div> -->
           
            <div class="form-group">
           
                <label for="full_name">Permissions:</label>

                <div class="checkbox">
                 @foreach( $permissions as $value ) 
                    <div>
                    <label>
                    {!! Form::checkbox('permission[]', $value->id) !!}
                        {{ $value->name }}
                    </label>
                    </div>
                 @endforeach
                </div>
                
            </div>



        </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    

       <!--  <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> -->
    
    </div>
</div>




</div>



</form>
@endsection