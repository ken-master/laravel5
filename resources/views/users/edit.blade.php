@extends('layout')



@section('content')

<div class="col-md-8">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit User</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{{ route('user.update', $user->id) }}}" method="POST" >
        <div class="box-body">
            
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="id" value="{{$user->id}}" />
           
            <div class="form-group">
                <label for="full_name">First Name:</label> <span class="text-red">{{ $errors->first('first_name') }}</span>
                <input type="input" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="{{ $user->first_name }}">
            </div>

            <div class="form-group">
                <label for="full_name">Last Name:</label> <span class="text-red">{{ $errors->first('last_name') }}</span>
                <input type="input" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="{{ $user->last_name }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email Address:</label> <span class="text-red">{{ $errors->first('email') }}</span>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label> <span class="text-red">{{ $errors->first('password') }}</span>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

           <div class="form-group">
                <label for="comfirm_password">Confirm Password:</label> <span class="text-red">{{ $errors->first('password_confirmation') }}</span>
                <input type="password" name="password_confirmation" class="form-control" id="comfirm_password" placeholder="Confirm Password">
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>



@endsection