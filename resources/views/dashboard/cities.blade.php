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
        <title>Cities</title>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
                <li><a class="treeview-item" href="/dashboard/clients"><i class="icon fa fa-circle-o"></i>Clients</a></li>
            </ul>
            </li>
            </ul>
        </aside>

                <div class="row">
                    @if(Session('lang')=="ar")
                    <div class="col-xl-10 col-lg-9 col-md-8 mr-auto main-div1">
                        <div class="pt-md-5 mt-md-3">
                    @else
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto main-div2">
                        <div class="pt-md-5 mt-md-3">
                    @endif
                            <div class="text-center mb-5" ></div>
                            <div align="left" style="margin-left: 15px"><h3>@lang('dashboard.city_page')</h3></div>

                            <div align="right">
                                <button type="button" name="add" id="add_data" class="btn btn-success btn-xl mr-5">@lang('dashboard.add_city')</button>
                            </div>
                            <br />
                            <table id="student_table" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>@lang('dashboard.name')</th>
                                        <th>@lang('dashboard.notes')</th>
                                        <th>@lang('dashboard.action')</th>
                                    </tr>
                                </thead>
                            </table>

                            <div id="studentModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" id="student_form">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add Data</h4>
                                            </div>
                                            <div class="modal-body">
                                                {{csrf_field()}}
                                                <span id="form_output"></span>
                                                <div class="form-group">
                                                    <label>Enter Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter Notes</label>
                                                    <input type="text" name="notes" id="notes" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="student_id" id="student_id" value="" />
                                                <input type="hidden" name="button_action" id="button_action" value="insert" />
                                                <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#student_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('cities.getdata') }}",
                    "columns":[
                        { "data": "name" },
                        { "data": "notes" },
                        { "data": "action", orderable:false, searchable: false}
                    ]
                });

                $('#add_data').click(function(){
                    $('#studentModal').modal('show');
                    $('#student_form')[0].reset();
                    $('#form_output').html('');
                    $('#button_action').val('insert');
                    $('#action').val('Add');
                    $('.modal-title').text('Add Data');
                });

                $('#student_form').on('submit', function(event){
                    event.preventDefault();
                    var form_data = $(this).serialize();
                    $.ajax({
                        url:"{{ route('cities.postdata') }}",
                        method:"POST",
                        data:form_data,
                        dataType:"json",
                        success:function(data)
                        {
                            if(data.error.length > 0)
                            {
                                var error_html = '';
                                for(var count = 0; count < data.error.length; count++)
                                {
                                    error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                                }
                                $('#form_output').html(error_html);
                            }
                            else
                            {
                                $('#form_output').html(data.success);
                                $('#student_form')[0].reset();
                                $('#action').val('Add');
                                $('.modal-title').text('Add Data');
                                $('#button_action').val('insert');
                                $('#student_table').DataTable().ajax.reload();
                            }
                        }
                    })
                });

                $(document).on('click', '.edit', function(){
                    var id = $(this).attr("id");
                    $('#form_output').html('');
                    $.ajax({
                        url:"{{route('cities.fetchdata')}}",
                        method:'get',
                        data:{id:id},
                        dataType:'json',
                        success:function(data)
                        {
                            $('#name').val(data.name);
                            $('#notes').val(data.notes);
                            $('#student_id').val(id);
                            $('#studentModal').modal('show');
                            $('#action').val('Edit');
                            $('.modal-title').text('Edit Data');
                            $('#button_action').val('update');
                        }
                    })
                });

                $(document).on('click', '.delete', function(){
                    var id = $(this).attr('id');
                    if(confirm("Are you sure you want to Delete this data?"))
                    {
                        $.ajax({
                            url:"{{route('cities.removedata')}}",
                            mehtod:"get",
                            data:{id:id},
                            success:function(data)
                            {
                                alert(data);
                                $('#student_table').DataTable().ajax.reload();
                            }
                        })
                    }
                    else
                    {
                        return false;
                    }
                });
                $(document).on('click', '.active', function(){
                    var id = $(this).attr('id');

                    $.ajax({
                        url:"{{route('cities.active')}}",
                        mehtod:"get",
                        data:{id:id},
                        success:function(data)
                        {
                            $('#student_table').DataTable().ajax.reload();
                        }
                    })
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
    </body>
</html>
