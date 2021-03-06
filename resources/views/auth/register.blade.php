@extends('auth')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    
    <form action="/auth/store" method="post">
      
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

      <div class="form-group has-feedback {{ Session::get('has-error') }}">
        
        <label class="control-label" for="full_name">
          <i class="fa fa-times-circle-o"></i> {{ $errors->first('full_name') }}
        </label>

        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Full name"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ Session::get('has-error') }}">
        <label class="control-label" for="email">
          <i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}
        </label>

        <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ Session::get('has-error') }}">

        <label class="control-label" for="full_name">
          <i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}
        </label>

        <input type="password" name="password" class="form-control" placeholder="Password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback {{ Session::get('has-error') }}">
        <label class="control-label" for="password_confirmation">
          <i class="fa fa-times-circle-o"></i> {{ $errors->first('password_confirmation') }}
        </label>

        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Retype password"/>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- <div class="col-xs-8">    
          
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>   

        </div> --><!-- /.col -->
        
        <div class="col-xs-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div><!-- /.col -->

      </div>


    </form>        


  <!--   <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
    </div> -->

    <a href="/auth/login" class="text-center">I already have a membership</a>
  </div><!-- /.form-box -->
</div><!-- /.register-box -->
@endsection



@section('footer_scripts')

 <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

@endsection
