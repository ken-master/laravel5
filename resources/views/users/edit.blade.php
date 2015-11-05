@extends('layout')



@section('content')
<div class="row">
<form role="form" action="{{{ route('user.update', $user->id) }}}" method="POST" >
<div class="col-md-8">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit User</h3> - <a href="{{ route('user.index') }}">Go back</a>
    </div><!-- /.box-header -->
    <!-- form start -->
   
        <div class="box-body">
            
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="id" value="{{$user->id}}" />
           
            <div class="form-group">
                <label for="full_name">Username:</label> <span class="text-red">{{ $errors->first('username') }}</span>
                <input disabled="disabled" type="input" name="username" class="form-control" id="username" placeholder="Enter First Name" value="{{ $user->username }}">
            </div>


             <div class="form-group">
                <label for="exampleInputEmail1">Email Address:</label> <span class="text-red">{{ $errors->first('email') }}</span>
                <input disabled="disabled" type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
            </div>
           
            <div class="form-group">
                <label for="full_name">First Name:</label> <span class="text-red">{{ $errors->first('first_name') }}</span>
                <input type="input" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="{{ old('first_name', $user->profile->first_name) }}">
            </div>

            <div class="form-group">
                <label for="full_name">Last Name:</label> <span class="text-red">{{ $errors->first('last_name') }}</span>
                <input type="input" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="{{ old('last_name', $user->profile->last_name) }}">
            </div>

             <div class="form-group">
                <label for="full_name">Middle Name:</label> <span class="text-red">{{ $errors->first('middle_name') }}</span>
                <input type="input" name="middle_name" class="form-control" id="middle_name" placeholder="Enter Middle Name" value="{{ old('middle_name', $user->profile->middle_name) }}">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label> <span class="text-red">{{ $errors->first('password') }}</span>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

           <div class="form-group">
                <label for="comfirm_password">Confirm Password:</label> <span class="text-red">{{ $errors->first('password_confirmation') }}</span>
                <input type="password" name="password_confirmation" class="form-control" id="comfirm_password" placeholder="Confirm Password">
            </div>

            <div class="form-group">
                <label for="full_name">Role:</label> <span class="text-red">{{ $errors->first('role') }}</span>
                {!! 
                    Form::select(
                        'role', 
                        $roles, 
                        old('role', $user->role_id),  
                        ['class' => 'form-control'] 
                    ) 
                !!}
            </div>
        </div><!-- /.box-body -->


        



       <!--  <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> -->
    
    </div>
</div>





<div class="col-md-4">
     <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">User Profile</h3> 
    </div><!-- /.box-header -->

    <!-- USER PROFILE SECTIOn -->
    <div class="box-body">
        <div class="form-group">
            <label for="full_name">Division:</label> <span class="text-red">{{ $errors->first('division') }}</span>
            <input type="input" name="division" class="form-control" id="division" placeholder="Enter Division" value="{{ old('division', $user->profile->division) }}">
        </div>


        <div class="form-group">
            <label for="full_name">Department:</label> <span class="text-red">{{ $errors->first('department') }}</span>
            <input type="input" name="department" class="form-control" id="department" placeholder="Enter Department" value="{{ old('department',  $user->profile->department) }}">
        </div>

        <div class="form-group">
            <label for="full_name">Section:</label> <span class="text-red">{{ $errors->first('section') }}</span>
            <input type="input" name="section" class="form-control" id="section" placeholder="Enter Section" value="{{ old('section', $user->profile->section) }}">
        </div>

        <div class="form-group">
            <label for="full_name">Posistion:</label> <span class="text-red">{{ $errors->first('posistion') }}</span>
            <input type="input" name="posistion" class="form-control" id="posistion" placeholder="Enter Posistion" value="{{ old('posistion', $user->profile->posistion) }}">
        </div>



        <div class="form-group">
            <label for="full_name">Status:</label> <span class="text-red">{{ $errors->first('status') }}</span>
            {!! 
                Form::select(
                    'status', 
                    $status, 
                    old('status',$user->status),
                    ['class' => 'form-control'] 
                ) 
            !!}
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</div>



</form>
</div>
@endsection