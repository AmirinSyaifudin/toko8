<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | STORE </title>
    <link href="{{ asset('Eshopper/css/bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/font-awesome.min.css' ) }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/prettyPhoto.css' ) }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/price-range.css' ) }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/animate.css' ) }}" rel="stylesheet">
	<link href="{{ asset('Eshopper/css/main.css' ) }}" rel="stylesheet">
	<link href="{{ asset('Eshopper/css/responsive.css' ) }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('Eshopper/images/ico/favicon.ico' ) }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('Eshopper/images/ico/apple-touch-icon-144-precomposed.png' ) }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('Eshopper/images/ico/apple-touch-icon-114-precomposed.png' ) }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('Eshopper/images/ico/apple-touch-icon-72-precomposed.png' ) }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('Eshopper/images/ico/apple-touch-icon-57-precomposed.png' ) }}">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i>081222213401</a></li>
								<li><a href=""><i class="fa fa-envelope"></i>amirinsyaifudin6@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{ asset('Eshopper/images/home/logo.png' ) }}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ asset('login') }}"><i class="fa fa-lock"></i> LOGIN</a></li>
								<li><a href="{{ asset('register') }}"><i class="fa fa-lock"></i> REGISTER</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
                        	<h2>SILAHKAN REGISTRASI </h2>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div>
                                    <input type="text" class="@error('name') invalid @enderror" name="name" value="{{ old('name') }}"
                                    placeholder="Name">
                                        @error('name')
                                            <span class="helper-text" data-error="{{ $message }}"></span>
                                        @enderror
                                </div>
                                <div>
                                    <input type="email" class="validate @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                    placeholder="Email Address">
                                        @error('email')
                                            <span class="helper-text" data-error="{{ $message }}"></span>
                                        @enderror
                                </div>
                                <div>
                                    <input type="password" class="@error('password') invalid @enderror" name="password" value=""
                                    placeholder="Password">
                                        @error('password')
                                            <span class="helper-text" data-error="{{ $message }}"></span>
                                        @enderror
                                </div>
                                <div>
                                    <input type="password" class="@error('password_confirmation') invalid @enderror" name="password_confirmation" value=""
                                    placeholder="Passwor Confirmation">
                                        @error('password_confirmation')
                                            <span class="helper-text" data-error="{{ $message->error }}"> </span>
                                        @enderror
                                </div>
                                <div>
									<select name="role" class="input-block-level">
										<option>-- Pilih --</option>
										<option value="admin">Admin</option>
										<option value="customer">Customer</option>
                                        <option value="cashier">Cashier</option>
									</select>
                                </div>
                                <span>
                                    <input type="checkbox" class="checkbox">
                                    Keep me signed in
                                </span>
                                <button type="submit" name="" value="Register" class="btn btn-default">Daftar</button>
                            </form>
                              <a class="btn btn-primary" href="{{route('login')}}">Login</a>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section>
    <!--/form-->
	
	<footer id="footer">
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="{{ asset('Eshopper/http://www.themeum.com' ) }}">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer>
    <script src="{{ asset('Eshopper/js/jquery.js' ) }}"></script>
    <script src="{{ asset('Eshopper/js/price-range.js' ) }}"></script>
    <script src="{{ asset('Eshopper/js/jquery.scrollUp.min.js' ) }}"></script>
    <script src="{{ asset('Eshopper/js/bootstrap.min.js' ) }}"></script>
    <script src="{{ asset('Eshopper/js/jquery.prettyPhoto.js' ) }}"></script>
    <script src="{{ asset('Eshopper/js/main.js' ) }}"></script>
</body>
</html>

{{-- 
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
