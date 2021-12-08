@extends('layouts.frontend.v2index')

@section('content')
<section>
    <div class="container-fluid p-0 home-content-login container-top-border">
      <!-- account block start -->
      <div class="container" >
        <div class="row">
          <div class="col-xl-6 col-lg-6 col-md-6 vertical-align d-none d-lg-block">
              <img class="img-fluid" src="{{ asset('newfrontend/assets/img/bg 2.png') }}" width="500px" height="500px">
          </div>
            <div class="col-xl-6 offset-xl-0 col-lg-6 offset-lg-0 col-md-8 offset-md-2">
              <div class="rightRegisterForm-login">
                <form id="loginForm" class="form-horizontal" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}
                    <div class="p-4">
                      <div class="form-group-login">
                          <img src="newfrontend/assets/img/logo.png" alt="" class="img-fluid" style="display:block; margin:auto; "><br>
                          <h4><b>Login</b></h4><br>
                          <label>Email ID</label>
                          <input name="email" type="text" class="form-control form-control-sm" placeholder="Email ID" value="">
                        @if ($errors->has('email'))
                          <label class="error" for="email">{{ $errors->first('email') }}</label>
                        @endif
                                
                      </div>
                      <div class="form-group-login">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control form-control-sm" placeholder="Password" value="">
                        @if ($errors->has('password'))
                          <label class="error" for="password">{{ $errors->first('password') }}</label>
                        @endif
                      </div>
                      <div class="form-group-login">
                        <div class="row m-0">
                          <div class="custom-control custom-checkbox col-6">
                              <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                              <label class="custom-control-label" for="remember">Remember me</label>
                          </div>
                          <div class="col-6">
                              <a href="{{ route('password.request') }}" class="float-right forgot-text">Forgot password?</a>
                          </div>
                        </div>
                      </div>
                      <div class="form-group-login">
                        <button type="submit" class="btn-lg btn-block login-page-button"><b>Login</b></button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
      </div>
  </section>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).ready(function()
{
    $("#loginForm").validate({
            rules: {
                email:{
                    required: true,
                    email:true
                },
                password:{
                    required: true
                }
            },
            messages: {
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.'
                },
                password: {
                    required: 'The password field is required.'
                }
            }
        });

});
</script>
@endsection