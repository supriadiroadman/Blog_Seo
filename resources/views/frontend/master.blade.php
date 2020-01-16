<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Callie HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('/frontend/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('/frontend/css/style.css')}}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER -->
    @include('frontend._header')
    <!-- /HEADER -->

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div id="hot-post" class="row hot-post">

                <div class="col-md-8 hot-post-left">
                    <!-- post1 -->
                    @yield('post1')
                    <!-- post1 -->
                </div>

                <div class="col-md-4 hot-post-right">
                    @include('frontend._sidebar')
                </div>

            </div>
        </div>
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="row">
                        <!-- post2 -->
                        @yield('post2')
                        <!-- /post2 -->
                    </div>
                </div>

                <div class="col-md-4">
                    @include('frontend._widget')
                </div>

            </div>
        </div>
    </div>
    <!-- /SECTION -->

    <!-- FOOTER -->
    @include('frontend._footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{asset('/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('/frontend/js/main.js') }}"></script>

</body>

</html>
