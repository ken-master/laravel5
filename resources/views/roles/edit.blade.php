@extends('layout')



@section('content')

<form role="form" action="{{{ route('role.update', $role->id) }}}" method="POST" >
<div class="col-md-8">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit Role</h3> - <a href="{{ route('role.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="id" value="{{$role->id}}" />

            <div class="form-group">
                <label for="full_name">Role Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                <input type="input" name="name" class="form-control" id="name" placeholder="Enter Role Name" value="{{ old('name', $role->name) }}">
            </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('description') }}</span>
                <input type="input" name="description" class="form-control" id="description" placeholder="Enter Description" value="{{ old('description',$role->description) }}">
            </div>
           
<!--             <div class="form-group">
                <label for="full_name">Is Active:</label>
                {!! Form::checkbox('is_active', '1') !!}
            </div> -->
           
            <div class="form-group">
           
                <label for="full_name">Access Levels::</label>
                    <?php //dd( $role->accessLevel->toArray() ); ?>
                <div class="checkbox">
                @foreach( $accessLevels as $accessLevel ) 
                    <div>
                    <label>
                    {!! Form::checkbox('access_level[]', $accessLevel->id, in_array( $accessLevel->id, array_fetch($role->accessLevel->toArray(), 'id') )) !!}
                        {{ $accessLevel->name }}
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