<!-- @extends('layouts.admin_app') -->
<?php /*
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    @if ($message = Session::get('success_message'))
                    <div class="alert alert-success alert-block" style="background-color:cornflowerblue;border-color: cornflowerblue;">
                        <button type="button" class="close" data-dismiss="alert">×</button>  
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error_message'))
                    <div class="alert alert-success alert-block" style="background-color:cornflowerblue;border-color: cornflowerblue;">
                        <button type="button" class="close" data-dismiss="alert">×</button>  
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ url('vendor\register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('vendor_image') ? ' has-error' : '' }}">
                            <label for="vendor_image" class="col-md-4 control-label">Vendor Profile</label>

                            <div class="col-md-6">
                                <input id="vendor_image" type="file" class="form-control" name="vendor_image">

                                @if ($errors->has('vendor_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('vendor_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<?php  */?>
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
      strong {
    color: red;
}
  </style>
  <body class="home seller-reg"> 

<div class="modal-content">
      <div class="modal-body">
        <div class="left-modal-bg">
         
          </div>
          <div class="right-modal-bg">
           <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
            <form class="form-horizontal" method="POST" action="{{ url('vendor\register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

              <div class="seller-reg-wrap" align="center">
             
               <img class="seller-reg-img" src="{{'/assets/homecss/images/logo-pass.png'}}" style="width: 140px;">

              </div>

              <h4>Become A Seller</h4>
              @if ($message = Session::get('success_message'))
                    <div class="alert alert-success alert-block" style="background-color:#680b12;border-color: #680b12;">
                        <button type="button" class="close" data-dismiss="alert" class="close" data-dismiss="alert" style="color:#ffffff; width: 27%;">×</button>  
                        <strong style="color:#ffffff; ">{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error_message'))
                    <div class="alert alert-success alert-block" style="background-color:#680b12;border-color: #680b12;">
                        <button type="button" class="close" data-dismiss="alert" class="close" data-dismiss="alert" style="color:#ffffff; width: 27%;">×</button>  
                        <strong style="color:#ffffff; ">{{ $message }}</strong>
                    </div>
                    @endif
                <div class="form-group">
                    <small id="emailHelp" class="form-text text-muted">
                      <label for="exampleInputEmail1">Name</label>
                    </small>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="Enter name">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <small id="emailHelp" class="form-text text-muted">
                      <label for="exampleInputEmail1">Email</label>
                    </small>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group" style="position: relative;">
                  <small id="emailHelp" class="form-text text-muted">
                    <label for="exampleInputPassword1">Password</label>
                  </small>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <i class="fa fa-eye"></i>
                     @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group" style="position: relative;">
                  <small id="emailHelp" class="form-text text-muted">
                    <label for="exampleInputPassword1">Confirm Password</label>
                  </small>
                  <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Password">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="form-group"> 
                    <div class=" file-b-a-s">
                        <label>Upload profile
                          <img src="{{'/assets/homecss/images/upload.png'}}">
                        <input type="file" size="80" id="vendor_image" name="vendor_image">
                        </label> 
                    </div>
                </div>
                <button type="submit" class="edt-btn">Save</button>
                  <p>
                    <small id="emailHelp" class="form-text text-muted">
                      <label for="exampleInputEmail1">Already have an account</label>
                      <span style="cursor: pointer;" onclick="window.location.href='/vendor/login';">Login</span>
                    </small>
                    </p>
                  </form>
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