<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Strongly Typed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<!-- Header -->
				<section id="header">
    				<div class="container" style="text-align: center;">
        
        		<!-- Logo image -->
       			 <img src="{{ asset('assets/css/images/logo.png') }}" alt="Booth Image" style="width: 150px; height: auto; display: block; margin: 0 auto 10px;" />

       			 <!-- Logo text -->
        		<h1 id="logo">
           			 <a href="index.html" style="color: #a4d88cff;">Tally Alley</a>
        		</h1>
        
       			 <!-- Tagline -->
        		<p>quick and easy system for artist merchandise registration</p>


						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="{{ route('merchandise.create')}}" style="color: #ec4a86b0;"><span>Register Your Merchandise</span></a></li>
									<li>
										<a class="icon fa-chart-bar" href="{{ route('events.index') }}" style="color: #ec4a86b0;"><span>Events</span></a>
										
									</li>
									<li>
    									<a class="icon solid fa-cog" href="{{ route('merchandise.index')}}" style="color: #ec4a86b0;">
      										  <span>List of Merchandise</span>
   										 </a>
									</li>

                                
									@auth
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Log Out</button>
</form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            @if(Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @endauth
                                
								</ul>
							</nav>

					</div>
				</section>

			<!-- Features -->
				<section id="features">
					<div class="container">
						<header>
							<h2>Leave your merch to us!</strong>!</h2>
						</header>
						<div class="row aln-center">
							<div class="col-4 col-6-medium col-12-small">

								<!-- Feature -->
									<section>
										<a href="#" class="image featured">
    										<img src="{{ asset('assets/css/images/merch.jpg') }}" alt="Merchandise Image">
										</a>
										<header>
											<h3>Register all kinds of merchandise!</h3>
										</header>
										<p>Stickers, prints, keychains and more! Have them organized worry free.</p>
									</section>

							</div>
							<div class="col-4 col-6-medium col-12-small">

								<!-- Feature -->
									<section>
										<img src="{{ asset('assets/css/images/booth.jpg') }}" alt="Booth Image">
										<header>
											<h3>Easy way to join the art community!</h3>
										</header>
										<p>You don't have to go through the hassle of signing up for boothing events, we'll do it for you!</p>
									</section>

							</div>
							<div class="col-4 col-6-medium col-12-small">

								<!-- Feature -->
									<section>
										<img src="{{ asset('assets/css/images/event.jpg') }}" alt="Event Image">
										<header>
											<h3>Keep in touch with the latest artist alleys.</h3>
										</header>
										<p>Sign up your merchandise to join different upcoming events!</p>
									</section>

							</div>
							
						</div>
					</div>
				</section>

			
			
	</body>
</html>