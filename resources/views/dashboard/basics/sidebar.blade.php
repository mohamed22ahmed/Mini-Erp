<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
        <p class="app-sidebar__user-designation">@lang('dashboard.welcome')</p><br>
        <p class="app-sidebar__user-name" style="font-size:22px">{{  Auth::user()->username }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="/dashboard"><i class="fas fa-chart-line app-menu__icon"></i><span class="app-menu__label">@lang('dashboard.dashboard')</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="fas fa-exchange-alt app-menu__icon"></i><span class="app-menu__label">@lang('dashboard.basics')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{route('branches.index')}}">
                    <i class="icon fas fa-hand-point-right"></i>
                    @lang('dashboard.branches')
                </a>
            </li>
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

        <li><a class="app-menu__item" href="/dashboard/exp_rev"><i class="fas fa-chart-bar app-menu__icon "></i><span class="app-menu__label">Expenses Revenues</span></a>

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
