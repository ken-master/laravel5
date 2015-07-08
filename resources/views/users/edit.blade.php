@extends('layout')



@section('content')

<div class="col-md-8">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Edit User</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{{ route('user.update', '3') }}}" method="POST" accept-charset="UTF-8">
        <div class="box-body">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
           
            <div class="form-group">

                <label for="full_name">Full Name:</label> <span class="text-red">Input Error</span>
                <input type="input" name="full_name" class="form-control" id="full_name" placeholder="Enter Full Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email Address:</label> <span class="text-red">Input Error</span>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label> <span class="text-red">Input Error</span>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

           <div class="form-group">
                <label for="comfirm_password">Confirm Password:</label> <span class="text-red">Input Error</span>
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