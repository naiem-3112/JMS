<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Journal Management System</title>
	<!--	Google Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

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
				<li><a href="#">Menuscripts</a></li>
				<li><a href="#">contact us</a></li>
			</ul>
		</div>
		<div class="clr"></div>
	</div>
</div>
<!--banner part-->
<div class="full-wr full-banner">
	<div class="main-wr main-banner">
		
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


<!--summarise part-->
<div class="full-wr full-summarise">
	<div class="main-wr">
		<div class="summarise-top">
			<div class="section-title">
				<h3>Contact Us</h3>
				<p>All the time we love to communicate</p>
			</div>
		</div>
		<div class="summarise-bottom">
			
		</div>
		<div class="clr"></div>
	</div>
<iframe style="margin-top: 20px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7296.213792725755!2d90.38516432509185!3d23.885827848068857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c46b6de8f207%3A0x638eb6830d10167d!2sSector%2010%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1605384624154!5m2!1sen!2sbd" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>

<!--footer part-->
<div class="full-wr full-footer">
	<div class="main-wr">
		<div class="footer-bottom">
			<div class="footer-col">
				<div class="footer-content">
					<h4>Menu</h4>
					<h5>Home</h5>
					<h5>About Us</h5>
					<h5>Contact Us</h5>
				</div>
			</div>
			<div class="footer-col">
				<div class="footer-content">
					<h4>Connect</h4>
					<h5>Linkedin</h5>
					<h5>Facebook</h5>
					<h5>Twitter</h5>
				</div>
			</div>
			<div class="footer-col">
				<div class="footer-content">
					<h4>Address</h4>
					<p>H:4; R:6/A; Uttara, Dhaka-1230</p>
				</div>
			</div>
			<div class="footer-col">
				<div class="footer-content">
					<h4>About</h4>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta, quaerat.</p>
				</div>
			</div>
			<div class="footer-col">
				<div class="footer-content">
					<div class="footer_right">
						<div class="footer_right_logo">
							<a href="#"><img src="{{asset('back_temp/dist/img/favicon.png')}}"></a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="clr"></div>
	</div>
</div>
<div style="background: #BD070E" class="full-wr">
	<div class="main-wr">
		<p style="text-align: center; color: #ffffff">Copyright © 2020 Mohammad Tamim Rahman </p>
	</div>
</div>
</body>
</html> 