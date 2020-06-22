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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
                        <i class="flag-icon flag-icon-us mr-2"></i> @lang('dashboard.english')
                        </a>
                        <a href="/lang/ar"  class="{{ @session('lang')=='ar'? 'dropdown-item active':'dropdown-item'}}">
                        <i class="flag-icon flag-icon-sa mr-2"></i> @lang('dashboard.arabic')
                        </a>
                    </div>
                </li>
                <li></li>
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> @lang('dashboard.settings')</a></li>
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> @lang('dashboard.profile')</a></li>
                        <li>
                            <a class="dropdown-item" href="/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-lg"></i>
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

        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <div>
            <p class="app-sidebar__user-designation">@lang('dashboard.welcome')</p><br>
            <p class="app-sidebar__user-name" style="font-size:22px">{{  Session::get('username') }}</p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item active" href="/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">@lang('dashboard.dashboard')</span></a></li>


            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-sliders"></i><span class="app-menu__label">@lang('dashboard.basics')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="/dashboard/branches"><i class="icon fa fa-circle-o"></i>@lang('dashboard.branches')</a></li>
                    <li><a class="treeview-item" href="/dashboard/categories"><i class="icon fa fa-circle-o"></i>@lang('dashboard.categories')</a></li>
                    <li><a class="treeview-item" href="/dashboard/colors"><i class="icon fa fa-circle-o"></i>@lang('dashboard.colors')</a></li>
                    <li><a class="treeview-item" href="/dashboard/units"><i class="icon fa fa-circle-o"></i>@lang('dashboard.units')</a></li>
                    <li><a class="treeview-item" href="/dashboard/cities"><i class="icon fa fa-circle-o"></i>@lang('dashboard.cities')</a></li>
                    <li><a class="treeview-item" href="/dashboard/in_outs"><i class="icon fa fa-circle-o"></i>@lang('dashboard.in_outs')</a></li>
                <li><a class="treeview-item" href="/dashboard/discounts"><i class="icon fa fa-circle-o"></i>@lang('dashboard.discounts')</a></li>
                </ul>
            </li>

            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">@lang('dashboard.administrator')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="/dashboard/admins"><i class="icon fa fa-circle-o"></i>Admins</a></li>
                    <li><a class="treeview-item" href="/dashboard/companies"><i class="icon fa fa-circle-o"></i>Company Information</a></li>
                </ul>
                </li>
            </ul>
        </aside>

        <section>
            <div class="container-fluid">
                <div class="row">
                    @if(Session('lang')=="ar")
                    <div class="col-xl-10 col-lg-9 col-md-8 mr-auto main-div1">
                        <div class="pt-md-5 mt-md-3">
                    @else
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto main-div">
                        <div class="pt-md-5 mt-md-3">
                    @endif
                            <div class="text-center mb-5" ></div>
                            <div>Mohamed Ahmed</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
        <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
    </body>
</html>
