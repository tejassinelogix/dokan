<?php /*
@extends('vendor.layouts.master')

@section('content')
@include('vendor.include.top')
<body>
<div class="main-content" id="panel">        
    <!-- Header -->
    @include('vendor.include.header')
    <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col-xl-12">
                <div class="card">
                  <div class="cph" style="padding-bottom: 70px;">
                  <div class="login-box" style="width: 50%;margin: 0 auto;">
                      <div class="login-logo" style="padding: 10px;width: 30%;margin: 0 auto;">
                        <h2>Vendor <b> Login</h2>
                      </div>
                      
                      <div class="card">
                        @if ($message = Session::get('error'))
                         <div class="alert alert-success alert-block" style="background-color:cornflowerblue;border-color: cornflowerblue;">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                                 <strong>{{ $message }}</strong>
                         </div>
                         @endif
                        <div class="card-body login-card-body">
                          <p class="login-box-msg">Sign in to start your session</p>

                          <form class="form-horizontal" method="POST" action="{{ url('vendor\login') }}">
                          {{ csrf_field() }}
                            <div class="input-group mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-lock"></span>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-8">
                                <div class="icheck-primary">
                                  <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                  <label for="remember">
                                    Remember Me
                                  </label>
                                </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                              </div>
                              <!-- /.col -->
                            </div>
                          </form>                          
                          <!-- /.social-auth-links -->
                          <div class="row">
                            <p class="mb-1">                            
                                @if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('password.request') }}">I forgot my password</a>
                                @endif
                            </p> 
                          </div>                             
                        </div>
                        <!-- /.login-card-body -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @include('vendor.include.footer')
          </div>
        </div>
      </div>
    </div>
</div>        
@include('vendor.include.bottom')
</body>
@endsection

<?php */ ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">    
     <link rel="shortcut icon" href="{{'/assets/homecss/images/favicon.png'}}"/>
    <title>Dokan Online</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
    <link rel="stylesheet" href="{{'/assets/homecss/scss/animate.css'}}">
    <!-- Bootstrap core CSS -->    
   <link href="{{'/assets/homecss/scss/style.css'}}" rel="stylesheet">    
   <!-- slider -->    
   <script src="{{'/assets/homecss/slider/owl.carousel.min.js'}}"></script>
   <link rel="stylesheet" href="{{'/assets/homecss/slider/owl.carousel.min.css'}}">  
  </head>
  <style type="text/css">
    .alert-success
    {
      color: :#ffffff;
    }
  </style>
  <body class="home seller-log"> 


    <div class="seller-login">
      
      <div class="container">
        
        <div class="seller-card">
          
          <img src="{{'/assets/homecss/images/logo-pass.png'}}">
          <form class="form-horizontal" method="POST" action="{{ url('vendor\login') }}">
            {{ csrf_field() }}
              <h4>Seller Login</h4>
              @if ($message = Session::get('error'))
                <div class="alert alert-success alert-block" style="background-color:#680b12;border-color: #680b12;">
                  <button type="button" class="close" data-dismiss="alert" style="color:#ffffff; width: 27%;">×</button>  
                       <strong style="color:#ffffff; ">{{ $message }}</strong>
                </div>
              @endif
              <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">
                  <label for="exampleInputEmail1">Email</label>
                </small>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group" style="position: relative;">
                  <small id="emailHelp" class="form-text text-muted">
                    <label for="exampleInputPassword1">Password</label>
                  </small>
                  <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                    <i class="fa fa-eye"></i>
                  </div>
                  <small id="emailHelp" class="form-text text-muted" align="right">
                    <label style="cursor: pointer;" for="exampleInputEmail1" data-toggle="modal" data-dismiss="modal" data-target="#modalForgot">Forgot Password?</label>
                  </small>
                  <button type="submit" class="edt-btn">Login</button>
               
                  </form>

        </div>

        <div class="row">
          
          <div class="col-md-12">
            
                    <p class="seller-foot">
                    <small id="emailHelp" class="form-text text-muted">
                      <label for="exampleInputEmail1">Become a seller</label>
                      <span style="cursor: pointer;" onclick="window.location.href='/vendor/register';">Signup</span>

                    </small>
                    </p>

          </div>

        </div>

      </div>

    </div>



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="{{'/assets/homecss/js/wow.min.js'}}"></script>
 <script>
  new WOW().init();
</script>
<script src="{{'/assets/homecss/js/custom.js'}}"></script>


</body>
</html>
