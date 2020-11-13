<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Journal Management System</title>
	<!--	Google Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
<!--	Font Awesome-->
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/front.css') }}">
	{{--  <link rel="stylesheet" href="{{ asset('css/topnav.css') }}">  --}}
</head>
<body>
 <!-- top of main nav -->
<!--top header part start-->
<div class="full-wr top_header">
	<div class="main-wr">
            <div class="header_logo">
                <h2>JOURNAL</h2>
                {{--  <a href="#"><img src="{{asset('back_temp/dist/img/favicon.png')}}"></a>  --}}
            </div>
			{{-- <img src="{{asset('back_temp/dist/img/favicon.png')}}" alt=""> --}}
		<div class="top_header_mid">
			<marquee class="marq">{{ $today }}</marquee>
		</div>
		<div class="top_social_icon">
			<div class="log-reg">
                @guest
                <a class="l" href="{{ route('login') }}">Sign In</a>
                @if (Route::has('register'))
                <a class="l" href="{{ route('register') }}">Register</a>
                @endif
                @else
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    <button class="l">Logout</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="btn btn-info" href="{{ url('/dashboard') }}">Back To Session</a>
                @endguest
            </div>
		</div>
	</div>
</div>
<!--top header part end-->


<!--header part start-->
<div class="full-wr header">
	<div class="main-wr">
		<div class="header_left">
            <div class="header_left_logo">
                <a href="#"><img src="{{asset('back_temp/dist/img/favicon.png')}}"></a>
            </div>
        </div>
		<div class="header_right">
			<form action="">
				<input type="text" class="search_box" placeholder="search" name="">
				<input type="submit" class="search_btn" value="search">
			</form>
		</div>
    </div>
</div>

<!--header part end-->


<!-- end top of main nav -->
<!--header part-->
<div class="full-wr full-menu">
	<div class="main-wr">
		<div class="menu">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">about us</a></li>
				<li><a href="#">services</a></li>
				<li><a href="#">portfolio</a></li>
				<li><a href="#">contact us</a></li>
			</ul>
		</div>
		<div class="clr"></div>
	</div>
</div>
<!--banner part-->
<div class="full-wr full-banner">
	<div class="main-wr main-banner">
		<div class="banner-text">
			<h2>Simple, Beautiful <span>and Amazing</span></h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci beatae ea excepturi molestiae nemo obcaecati perferendis porro quam repudiandae, voluptatem. Adipisci beatae ea excepturi molestiae nemo obcaecati perferendis porro quam repudiandae, voluptatem.
			</p>
			<div class="banner-btn">
				<a href="#">Download</a>
			</div>
			<div class="banner-btn">
				<a href="#">Learn More</a>
			</div>

		</div>
	</div>
	<div class="banner-hand-img">
		<img src="images/hand-img.png" alt="hand img">
	</div>
</div>
<!--summarise part-->
<div class="full-wr full-summarise">
	<div class="main-wr">
		<div class="summarise-top">
			<div class="section-title">
				<h3>summarise the features</h3>
				<p>summarise what your product is all about</p>
			</div>
		</div>
		<div class="summarise-bottom">
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fas fa-comments"></i>
					<h4>Attractive Layout</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam fugit magni minus modi molestias qui quo repudiandae saepe tempore velit!</p>
				</div>
			</div>
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fas fa-mobile-alt"></i>
					<h4>Attractive Layout</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam fugit magni minus modi molestias qui quo repudiandae saepe tempore velit!</p>
				</div>
			</div>
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fab fa-apple"></i>
					<h4>Attractive Layout</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam fugit magni minus modi molestias qui quo repudiandae saepe tempore velit!</p>
				</div>
			</div>
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fas fa-angle-double-down"></i>
					<h4>Attractive Layout</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam fugit magni minus modi molestias qui quo repudiandae saepe tempore velit!</p>
				</div>
			</div>

		</div>
		<div class="clr"></div>
	</div>
</div>
<!--pricing part-->
<div class="full-wr full-price">
	<div class="main-wr">
		<div class="price-col">
			<div class="price-content">
				<h3>Basic Package</h3>
				<h2>20$</h2>
				<ul>
					<li>Lorem ipsum dolor sit</li>
					<li>amet, consectetur con</li>
					<li>Lorem ipsum dolor sectetur</li>
				</ul>
				<button>purchase</button>
			</div>
		</div>
		<div class="price-col">
			<div class="price-content">
				<h3>Basic Package</h3>
				<h2>20$</h2>
				<ul>
					<li>Lorem ipsum dolor sit</li>
					<li>amet, consectetur con</li>
					<li>Lorem ipsum dolor sectetur</li>
				</ul>
				<button>purchase</button>
			</div>
		</div>
		<div class="price-col">
			<div class="price-content">
				<h3>Basic Package</h3>
				<h2>20$</h2>
				<ul>
					<li>Lorem ipsum dolor sit</li>
					<li>amet, consectetur con</li>
					<li>Lorem ipsum dolor sectetur</li>
				</ul>
				<button>purchase</button>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>
<!--testimonial part-->
<div class="full-wr full-test">
	<div class="main-wr">
		<div id="hexagon"></div>
	</div>
</div>
</body>
</html> 