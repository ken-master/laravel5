@extends('layout')



@section('content')

<div class="col-md-8">
    <div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Create User</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form role="form">
        <div class="box-body">
            
            <div class="form-group">

                <label for="full_name">Full Name:</label> <span class="text-red">Input Error</span>
                <input type="email" class="form-control" id="full_name" placeholder="Enter Full Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email Address:</label> <span class="text-red">Input Error</span>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label> <span class="text-red">Input Error</span>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

           <div class="form-group">
                <label for="comfirm_password">Confirm Password:</label> <span class="text-red">Input Error</span>
                <input type="password" class="form-control" id="comfirm_password" placeholder="Confirm Password">
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>


@endsection