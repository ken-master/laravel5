@extends('layout')



@section('content')
<div class="row">
<form role="form" action="{{{ route('stor.store') }}}" method="POST" >
<div class="col-md-4">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Access Level List</h3> - <a href="{{ route('store.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            

            <div class="form-group">
                <label for="name">Name:</label> <span class="text-red">{{ $errors->first('name') }}</span>
                <input type="input" name="name" class="form-control" id="name" placeholder="Enter Store Name" value="{{ old('name') }}">
            </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Description:</label> <span class="text-red">{{ $errors->first('description') }}</span>
                <input type="input" name="description" class="form-control" id="description" placeholder="Enter Description" value="{{ old('description') }}">
            </div>


<!--             <div class="form-group">
                <label for="full_name">Is Active:</label>
                {!! Form::checkbox('is_active', '1') !!}
            </div> -->



        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
       
    
    </div>
</div>




</form>
</div>
@endsection