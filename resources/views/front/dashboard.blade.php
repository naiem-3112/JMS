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
	<link rel="stylesheet" href="{{ asset('css/front.css') }}">

	<style>
		.slick-prev, .slick-next {
			color: red;
    background: red;
    border-radius: 50%;
		}
		.slick-prev:hover, .slick-next:hover {
			color: red;
    background: red;
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
				<li><a href="#home">home</a></li>
				<li><a href="#about">about us</a></li>
				<li><a href="#features">Features</a></li>
				<li><a href="#menuscript">Manuscripts</a></li>
				<li><a href="#contact">contact us</a></li>
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
<div id="features" class="full-wr full-summarise">
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
					<h4>Writing a journal manuscript</h4>
					<p>Publishing your results is a vital step in the research lifecycle and in your career as a scientist. Publishing papers is necessary to get your work seen by the scientific community, to exchange your ideas globally and to ensure you receive the recognition for your results.</p>
				</div>
			</div>
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fa fa-pen"></i>
					<h4>For authors</h4>
					<p>With the researcher at the heart of the publishing experience, we have created a diverse portfolio of peer-reviewed, open access journals across a wide range of scientific and medical disciplines. Choose the journal that fits your niche.</p>
				</div>
			</div>
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fa fa-paper-plane"></i>
					<h4>For publishers</h4>
					<p>To assist publishers and societies in embracing the advantages offered by an open access publishing model, we have created Phenom - a simple, intuitive, cost-effective publishing solution that supports all workflows; from submission and peer review through to production and publication.</p>
				</div>
			</div>
			<div class="summarise-col">
				<div class="summarise-content">
					<i class="fas fa-angle-double-down"></i>
					<h4>Feature Keys</h4>
					<ul>
						<li><p>	prior to starting your research </p></li>
						<li><p> structure your manuscript and what to include in each section </p></li>
						<li><p>get the most out of your tables and figures so that they clearly represent your most important results.</p></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="clr"></div>
	</div>
</div>
<!--Menuscript part-->
<div id="menuscript" class="full-wr full-price">
	<div class="main-wr">
		<div class="summarise-top">
			<div class="section-title">
				<h3>Manuscripts</h3>
				<p>latest manuscripts of popular category</p>
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

<!--contact part-->
<div id="contact" class="full-wr full-summarise">
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

