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
            width: 1650px;
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
            border-bottom: 5px solid #e74c3c;
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
                        <button class="btn btn-info btn-sm l">Login</button>
                        <button class="btn btn-info btn-sm l">Registration</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row hr">
            <span ></span>
        </div>
    </div>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>