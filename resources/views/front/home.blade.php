{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journal Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .full {
            width: 1140px;
            margin: 0 auto;
        }

        .content {
            margin: 10px;
        }

        .social {
            float: left;
            transition: all 0.5s linear;
            width: 20px;
        }

        .social i {
            background: ;
            float: left;
            color: #2980b9;
            width: 20px;
            -webkit-transition: -webkit-transform .5s ease-in-out;
            transition: transform .5s ease-in-out;
        }

        .f:hover {
            color: #e74c3c;
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .t:hover {
            color: #e74c3c;
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);

        }

        .i:hover {
            color: #e74c3c;
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);

        }


        .l {
            background: #2980b9;
            border: none;

        }

        .l:hover {
            background: #e74c3c;
            border-color: #e74c3c;

        }

        .log-reg {
            float: right;
        }

        .hr {
            border-bottom: 15px solid #dae2e9;
            margin-top: 3px
        }

    </style>

</head>

<body>
    <div class="full">
        <div class="content">
            <div class="row">
                <div class="col-4">
                    <div class="social">
                        <i class="fa fa-facebook-square f"></i>
                        <i class="fa fa-twitter-square t"></i>
                        <i class="fa fa-linkedin-square i"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="log-reg">
                        @guest
                        <a href="{{ route('login') }}"><button class="btn btn-info  l">Login</button></a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"><button class="btn btn-info l">Registration</button></a>
                        @endif
                        @else
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <button style="background: #e74c3c; color: #ffffff" class="btn">Logout</button>
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
        <div class="row hr">
            <span></span>
        </div>
 --}}

        {{-- main section --}}
        {{-- @foreach($menuscripts as $menuscript)
        <div class="row">
            <div class="col-3">
                <div class="cover-image">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col-9">
                <div class="content">
                    <div class="title">
                        <h2>{{ $menuscript->title }}</h2>
                    </div>
                    <p>{{ $menuscript->summery }}?...</p>
                    <button class="btn btn-sm btn-info l">Read More</button>
                    @auth
                    <a href="{{ route('admin.menuscript.download', $menuscript->paper) }}"><button style="background: #e74c3c; color: #ffffff" class="btn btn-sm btn-xs"><i class="fa fa-download"></i> Download</button></a>
                    @endauth
                    @guest                   
                    <a href="{{ route('register') }}"><button style="background: #e74c3c; color: #ffffff" class="btn btn-sm btn-xs"><i class="fa fa-download"></i> Download</button></a>
                    @endguest
                </div>
            </div>
        </div>
        @endforeach --}}
    {{-- </div>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bazinger</title>
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
			<marquee class="marq">Its a trial learning purpose</marquee>
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