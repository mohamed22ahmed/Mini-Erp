<!DOCTYPE html>
<html lang="{{ @session('lang') }}" dir="{{ @session('lang')=='ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@pratikborsadiya">
        <meta property="twitter:creator" content="@pratikborsadiya">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vali Admin">
        <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
        <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <title>@yield('title')</title>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
        @if(Session('lang')=='ar')
            {{ App::setLocale('ar') }}
        @endif
        <header class="app-header"><a class="app-header__logo" href="index.html">Test</a>
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <ul class="app-nav">
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-globe fa-lg"></i></a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                        <a href="/lang/en"  class="{{ @session('lang')=='en'? 'dropdown-item active':'dropdown-item'}}">
                        <i class="flag-icon flag-icon-us mr-2"></i> English
                        </a>
                        <a href="/lang/ar"  class="{{ @session('lang')=='ar'? 'dropdown-item active':'dropdown-item'}}">
                        <i class="flag-icon flag-icon-sa mr-2"></i> اللغة العربية
                        </a>
                    </div>
                </li>
                <li></li>
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog"></i> @lang('dashboard.settings')</a></li>
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user"></i> @lang('dashboard.profile')</a></li>
                        <li>
                            <a class="dropdown-item" href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                @lang('dashboard.logout')
                                <form id="logout-form" action="/logout" method="POST" style="...">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>

            @include('dashboard.basics.sidebar')

            <div class="container-fluid">
                <div class="row">
                    @if(Session('lang')=="ar")
                    <div class="col-xl-10 col-lg-9 col-md-8 mr-auto main-div1">
                        <div class="pt-md-5 mt-md-3">
                    @else
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto main-div">
                        <div class="pt-md-5 mt-md-3" >
                    @endif
                        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
                            <div style="margin-left: 15px">
                                <h3>@yield('page_header')</h3>
                            </div>
                            <div>
                                <button type="button" name="add" id="add_data" class="btn btn-success btn-xl mr-5">@yield('button_name')</button>
                            </div>
                        </div>


                        @yield('content')


                        <style>
                            #student_table_wrapper .row {
                                width: 100% !important;
                            }
                        </style>

                        @yield('foo')

        <script>
            $(function () {
                $("select").select2();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
    </body>
</html>

