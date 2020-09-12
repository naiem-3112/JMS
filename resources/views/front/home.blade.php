<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journal Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .full{
            width: 1140px;
            margin: 0 auto;
        }

        .content{
            margin: 10px;
        }
        
        .social{
            float: left;
            transition: all 0.5s linear;
            width: 20px;
        }

        .social i{
            background:;
            float: left;
            color: #2980b9;
            width: 20px;
            -webkit-transition: -webkit-transform .5s ease-in-out;
                    transition:         transform .5s ease-in-out;
        }

       .f:hover{
            color: #e74c3c;
            -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
       }

       .t:hover{
        color: #e74c3c;
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    
        }

    .i:hover{
        color: #e74c3c;
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);

        }

       
        .l{
            background: #2980b9;
            border: none;

        }
        
        .l:hover{
            background: #e74c3c;
            border-color: #e74c3c;

        }

        .log-reg{
            float: right;
        }

        .hr{
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
                        <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   <button class="btn btn-info  l">Logout</button>
                                </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                                @endguest
                    </div>
                </div>
            </div>
        </div>
        <div class="row hr">
            <span ></span>
        </div>


        {{-- main section --}}
        <div class="row">
            <div class="col-3">
                <div class="cover-image">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col-9">
                <div class="content">
                    <div class="title">
                        <h2>Journal Title</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, deserunt non expedita laborum dolor eos quia alias magni esse natus itaque aliquam sed minima corrupti numquam nobis deleniti maiores vitae?...</p>
                    <button class="btn btn-sm btn-info l">Read More</button>
                </div>
            </div>
        </div>
    </div>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>