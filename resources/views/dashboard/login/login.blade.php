<html>
    <head>
	   <!--TO Support Many Language Include Arabic Language-->
        <meta charset="utf-8"/>

	   <!--For Internet Explorer-->
	    <meta http-equiv="X-UA-	Compatible"content="IE=edge">

	   <!--First mobilw meta-->
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description"content="mt company">
        <title>4SOFT</title>
        <link rel="shortcut icon" href="{{ asset('login/images/final logo-06.png') }}">
        <!--call bootstrap-->
	    <link rel="stylesheet"href="{{ asset('login/css/bootstrap.css') }}"/>
        <!--Page Style-->
        <link rel="stylesheet"href="{{ asset('login/css/main.css') }}"/>
       <!--Animate.css-->
       <link rel="stylesheet"href="{{ asset('login/css/animate.min.css') }}"/>
       <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
       <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	   <!--Internet Explorer-->
	    <script src="{{ asset('login/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('login/js/respond.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

	</head>
	<body>
        <div class="head" style="position: relative;width: 100%;height: 100%;">
            <div id="particles-js"style="position:absolute;z-index:0;top:0;left:0 ; width:100% ; height:100%"></div>
            <div class="form-page" style="position: absolute;z-index: 1;top: 0 ; left: 0; width:100%;height: 100%;">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center" style="margin-top: 12rem;">
                        <div class="col-xl-6 col-lg-7 col-sm-12 col-12 card-box-color">
                            <div class="card-box-content">
                                <div class="card-box-header">
                                    <img src="{{ asset('login/images/logo.png') }}" alt="">
                                    <p>Login into your pages account</p>
                                </div>
                                <div class="card-box-form">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control input" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="Password" class="form-control input" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="label">
                                                <a href="/dashboard/forget">Forget Password !!</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Log In" class="form-control btn-fill">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('login/js/particles.js') }}"></script>
        <script src="{{ asset('login/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
		<script src="{{ asset('login/js/wow.min.js') }}"></script>
        <script>
          new WOW().init();
        </script>
        <script src="js/jQuery3.3.1.min.js"></script>
        <!---Slider Laibiray-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="{{ asset('login/js/sliderComponents.js') }}"></script>
        <script src="{{ asset('login/js/e.js') }}"></script>
	</body>
</html>
