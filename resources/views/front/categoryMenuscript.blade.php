<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Journal Management System</title>
	<!--	Google Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	

	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cat.css') }}">
    <style>
		.slick-prev, .slick-next {
			color: red;
            background: #2c3e50;
            border-radius: 50%;
		}
		.slick-prev:hover, .slick-next:hover {
			color: red;
            background: #2c3e50;
            border-radius: 50%;
		}
	</style>
</head>
<body>
 <!-- top of main nav -->
<!--top header part start-->
<div class="full-wr top_header">
	<div class="main-wr">
            <div class="header_logo">
                <h2>JOURNAL</h2>
                {{--  <a href="#"><img src="{{asset('back_temp/dist/img/Jm_logo.jpg')}}"></a>  --}}
            </div>
			{{-- <img src="{{asset('back_temp/dist/img/Jm_logo.jpg')}}" alt=""> --}}
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
                <a href="#"><img src="{{asset('back_temp/dist/img/Jm_logo.jpg')}}"></a>
            </div>
        </div>
		<div class="header_right">
			<form action="">
				{{--  <input type="text" class="search_box" placeholder="search" name="">
				<input type="submit" class="search_btn" value="search">  --}}
			</form>
		</div>
    </div>
</div>

<!--header part end-->


<!-- end top of main nav -->
<!--header part-->
<div id="home" class="full-wr full-menu">
	<div class="main-wr">
		<div class="menu">
			<ul>
				<li><a href="{{ route('journal-front.home')}}">home</a></li>
				<li><a href="#about">about us</a></li>
				<li><a href="#features">Features</a></li>
				<li><a href="#menuscript">Menuscripts</a></li>
				<li><a href="#contact">contact us</a></li>
			</ul>
		</div>
		<div class="clr"></div>
	</div>
</div>
<!--banner part-->
<div class="full-wr full-banner">
	<div class="main-wr main-banner">
        <h2><span style="color: #bd070e">M</span>enuscript<span style="color: #bd070e">  D</span>etail<span style="color: #bd070e">  P</span>age</h2>
		
	</div>
</div>

<!--Menuscript part-->
<div id="menuscript" class="full-wr full-price">
	<div class="main-wr">
			<div class="single-menuscript-content">
				<h1>
					Title: {{ $menuscript->title }} <br>
				</h1>
				<br>
				<div class="publish-info">
					 <small>By- {{ $menuscript->user->name }}</small> <br>
					 <small>Published at- {{ $menuscript->updated_at->format('Y-m-d') }}</small>
				</div>
				<hr>
				<p>
					{{ $menuscript->summery }}
				</p>
				<a class="download" href="{{ route('menuscript.download', $menuscript->paper) }}">Download PDF <i class="fa fa-download"></i> </a>
			</div>
		<div class="clr"></div>
	</div>
</div>

<!--Menuscript part-->
<div id="menuscript" class="full-wr full-price">
	<div class="main-wr">
		<div class="summarise-top">
			<div class="section-title">
				<h3>Related Menuscripts </h3>
				<p>latest menuscripts of popular category</p>
			</div>
		</div>
		<div style="margin: 20px 0" class="menu-slider">
    
		@foreach($menuscripts as $menuscript)
		<div class="menuscript-col">
			<div class="menuscript-content">
				<h3>{{ $menuscript->category->name }}</h3>
				<h2>
					{{ $menuscript->title }} <br>
				</h2>
				<br>
				<div>
					 <small class="writer">By- {{ $menuscript->user->name }}</small> 
					 <small class="date">Published at- {{ $menuscript->updated_at->format('Y-m-d') }}</small>
				</div>
				<br>
				<p>
					{{ \Illuminate\Support\Str::limit($menuscript->summery, 150, '...') }}
				</p>
				<a class="readmore" href="{{ route('category.menuscript', $menuscript->id) }}" style=" ">Read more <i class="fa fa-arrow-right"></i> </a>
			</div>
		</div>
		@endforeach
		</div>
		<div class="clr"></div>
	</div>
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
							<a href="#"><img src="{{asset('back_temp/dist/img/Jm_logo.jpg')}}"></a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="clr"></div>
	</div>
</div>
<div style="background: #2c3e50" class="full-wr">
	<div class="main-wr">
		<p style="text-align: center; color: #ffffff">Copyright © 2021 Sanjida Silvy </p>
	</div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
	$('.menu-slider').slick({
  dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
           breakpoint: 400,
           settings: {
              arrows: false,
              slidesToShow: 1,
              slidesToScroll: 1
           }
        }]
});
</script>
</body>
</html> 

