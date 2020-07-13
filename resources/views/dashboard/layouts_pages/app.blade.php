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


    <style>

    </style>
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
                        <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog "></i> @lang('dashboard.settings')</a></li>
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

        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <div>
                <p class="app-sidebar__user-designation">@lang('dashboard.welcome')</p><br>
                <p class="app-sidebar__user-name" style="font-size:22px">{{  Session::get('username') }}</p>
                </div>
            </div>
            <ul class="app-menu">
                <li><a class="app-menu__item active" href="/dashboard"><i class="fas fa-chart-line app-menu__icon"></i><span class="app-menu__label">@lang('dashboard.dashboard')</span></a></li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="fas fa-exchange-alt app-menu__icon"></i><span class="app-menu__label">@lang('dashboard.basics')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/branches"><i class="icon fas fa-hand-point-right"></i>@lang('dashboard.branches')</a></li>
                        <li><a class="treeview-item" href="/dashboard/categories"><i class="icon fas fa-hand-point-right"></i>@lang('dashboard.categories')</a></li>
                        <li><a class="treeview-item" href="/dashboard/colors"><i class="icon fas fa-hand-point-right"></i>@lang('dashboard.colors')</a></li>
                        <li><a class="treeview-item" href="/dashboard/units"><i class="icon fas fa-hand-point-right"></i> @lang('dashboard.units')</a></li>
                        <li><a class="treeview-item" href="/dashboard/cities"><i class="icon fas fa-hand-point-right"></i>@lang('dashboard.cities')</a></li>
                        <li><a class="treeview-item" href="/dashboard/in_outs"><i class="icon fas fa-hand-point-right"></i>@lang('dashboard.in_outs')</a></li>
                        <li><a class="treeview-item" href="/dashboard/discounts"><i class="icon fas fa-hand-point-right"></i>@lang('dashboard.discounts')</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="fas fa-charging-station app-menu__icon"></i><span class="app-menu__label">Recharge</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/recharge_company"><i class="icon fas fa-hand-point-right"></i>Companies</a></li>
                        <li><a class="treeview-item" href="/dashboard/recharge_value"><i class="icon fas fa-hand-point-right"></i>Values</a></li>
                    </ul>
                </li>

                <li><a class="app-menu__item" href="/dashboard/exp_rev"><i class="fas fa-chart-bar app-menu__icon"></i><span class="app-menu__label">Expenses Revenues</span></a>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-store"></i><span class="app-menu__label">Stores</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/store"><i class="icon fas fa-hand-point-right"></i>Store</a></li>
                        <li><a class="treeview-item" href="/dashboard/store_transfer"><i class="icon fas fa-hand-point-right"></i>Store Transfer</a></li>
                        <li><a class="treeview-item" href="/dashboard/store_products"><i class="icon fas fa-hand-point-right"></i>Store Products</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fab fa-product-hunt"></i><span class="app-menu__label">Products</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/product"><i class="icon fas fa-hand-point-right"></i>Products</a></li>
                        <li><a class="treeview-item" href="/dashboard/product_color"><i class="icon fas fa-hand-point-right"></i>Product Colors</a></li>
                        <li><a class="treeview-item" href="/dashboard/product_discount"><i class="icon fas fa-hand-point-right"></i>Product Discounts</a></li>
                        <li><a class="treeview-item" href="/dashboard/product_unit"><i class="icon fas fa-hand-point-right"></i>Product Units</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Clients Providers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/client"><i class="icon fas fa-hand-point-right"></i>Clients</a></li>
                        <li><a class="treeview-item" href="/dashboard/provider"><i class="icon fas fa-hand-point-right"></i>Providers</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Mandoop Delivery</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/mandoop"><i class="icon fas fa-hand-point-right"></i>Mandoop</a></li>
                        <li><a class="treeview-item" href="/dashboard/delivery"><i class="icon fas fa-hand-point-right"></i>Delivery</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">@lang('dashboard.administrator')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="/dashboard/admins"><i class="icon fas fa-hand-point-right"></i>Admins</a></li>
                        <li><a class="treeview-item" href="/dashboard/companies"><i class="icon fas fa-hand-point-right"></i>Company Information</a></li>
                    </ul>
                </li>
            </ul>
        </aside>

    <div class="container-fluid">

        <div class="row">
            @if(Session('lang')=="ar")
            <div class="col-xl-10 col-lg-9 col-md-8 mr-auto main-div1">
                <div class="pt-md-5 mt-md-3">
            @else
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto main-div">
                <div class="pt-md-5 mt-md-3">
            @endif
                    @yield('page_content')
                </div>
            </div>
        </div>
    </div>


            <style>
                #student_table_wrapper .row {
                    width: 100% !important;
                    margin: auto;
                    margin-left:7px;
                }
            </style>

            <script>
                $(function () {
                    $("select").select2();
                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
            @yield('js-after-main')

    </body>
</html>
