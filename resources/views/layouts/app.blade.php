<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Basic need -->
	<title>Home Cinema</title>
	 

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{ URL::asset('css/plugins.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    
</head>
<body>
    
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
        <div class="row">
        	<p>Or via social</p>
            <div class="social-btn-2">
            	<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->

<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
     <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Profile pic') }}</label>

                            <div class="col-md-6">
                                <input id="profile_pic" type="text" class="form-control @error('email') is-invalid @enderror" name="profile_pic" value="{{ old('profile_pic') }}" required autocomplete="profile_pic">

                                @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
</div>
<!--end of signup form popup-->
    <div id="app">
         
        <header class=" ht-header" style="background-image: url('../images/uploads/user-hero-bg.jpg'); color: black !important">
		<div class="container">
			<nav class="navbar navbar-default navbar-custom">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header logo">
						<div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<div id="nav-icon1">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<a href="/"><img class="logo" src="image/logo1.png" alt="" width="119" height="58"></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav flex-child-menu menu-left "style="display: inline">
							<li class="hidden">
								<a href="#page-top"></a>
							</li>
							<li class="dropdown first">
								<a href="/">
								Home</a>
							</li>
							<li class="dropdown first">
								<a href="/movies_all">
								Movies</a>
							</li>
							<li class="dropdown first">
								<a href="/about">
								About Us</a>
							</li>
							<li class="dropdown first">
								<a href="/schedule">
								Schedule</a>
							</li>
                                                        
                                                        @if (Auth::check())
                                                        @if (Auth::user()->role == "admin" || Auth::user()->role == "moderator" )
							<li class="dropdown first">
								<a href="/admin">
								Admin</a>
							</li>
                                                        
                                                        @endif
                                                         @endif
						</ul>
                                            
                                            
                                            <ul class="nav navbar-nav flex-child-menu menu-right" style="display: inline">
                                                    
                                                    @if (Auth::check())
                                       
                                                  
                                                    <li ><a href="{{route('profile')}}">{{Auth::User()->name}}</a></li>
                                                    @else
                                                    <li class="loginLink"><a href="#">LOG In</a></li>
                                                    @endif
							
                                                         @if (Auth::check())
                                                         
                                                         		 <li class="btn "><a class="dropdown-item" href="{{ route('logout') }}"
                                                                                                       
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                                            </a>
                                    </li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
							
                                                        @else 
                                                         <li class="btn signupLink"><a href="#">sign up</a></li>
                                                         @endif
						 </ul>
                                            
                                            
					</div>
				<!-- /.navbar-collapse -->
			</nav>
			
			<!-- top search form -->
                        <form action="{{route('movies_all')}}" method="get">
			<div class="top-search">
                            
                            
                            <select>
                                <option>Films</option> 
                            
                            </select>
                                 
                                 <input type="text" name="title" placeholder="Search for a movie">
			</div>
                        </form>
                        
		</div>
	</header>
        <main >
            
            @yield('content')
            
        </main>
    </div>
    <!-- footer section-->
	<footer class="ht-footer">
		<div class="container">
			<div class="flex-parent-ft">
				<div class="flex-child-ft item1">
					 <a href="index-2.html"><img class="logo" src="/" alt=""></a>
					 <p>25th Abay st.<br>
					Almaty, ALA 00005</p>
					<p>Call us: <a href="#">(+7) 708 270 6036</a></p>
					<p><a href="#">(+7) 701 701 0727</a></p>
				</div>
				<div class="flex-child-ft item2">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">About Us</a></li> 
						<li><a href="#">Movies</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item3">
					<h4>Legal</h4>
					<ul>
						<li><a href="#">Terms of Use</a></li> 
						<li><a href="#">Privacy Policy</a></li>	
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item4">
					<h4>Account</h4>
					<ul>
						<li><a href="#">My Account</a></li> 
						<li><a href="#">Watchlist</a></li>	
						<li><a href="#">Collections</a></li>
						<li><a href="#">User Guide</a></li>
					</ul>
				</div>
				<div class="flex-child-ft item5">
					<h4>Newsletter</h4>
					<p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
					<form action="#">
						<input type="text" placeholder="Enter your email...">
					</form>
					<a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="ft-copyright">
			<div class="ft-left">
				<p>IITU WEB Development</p>
			</div>
			<div class="backtotop">
				<p><a href="#" id="back-to-top">Back to top<i class="ion-ios-arrow-thin-up"></i></a></p>
			</div>
		</div>
	</footer>
	<!-- end of footer section-->
	
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
	<script src="{{ URL::asset('js/plugins.js')}}"></script>
	<script src="{{ URL::asset('js/plugins2.js')}}"></script>
	<script src="{{ URL::asset('js/custom.js')}}"></script>
</body>
</html>
