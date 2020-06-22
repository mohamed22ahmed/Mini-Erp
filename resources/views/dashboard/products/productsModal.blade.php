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
        <title>Categories</title>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>

    <div class="container">
        <div class="card-header com-collapse d-flex justify-content-between">
            <h4>@lang('dashboard.company_page')</h4>
            <p class="text-primary "> Click To Show Company InFo</p>
        </div>
        <form method="post" enctype="multipart/form-data" style="display:none" class="compForm">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group">
                        <label>Select Store ID</label>
                        <select class="form-control">
                            <option>Select Branch ID</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name"> Name</label>
                        <div>
                            <input type="text"  name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Select Category ID</label>
                        <select class="form-control">
                            <option>Select Category ID</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address" >Address</label>
                        <div>
                            <input type="text"  name="address" id="address" class="form-control">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="active"  >Is Active</label>
                        <div>
                            <input type="text"  name="active" id="active" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cur_amount"  >Current Amount</label>
                        <div>
                            <input type="text"  name="cur_amount" id="cur_amount" class="form-control">
                        </div>
                    </div><br>
                    <div class="form-group col-md-6">
                        <label for="min_amount"  >Minimum Amount</label>
                        <div>
                            <input type="text"  name="min_amount" id="min_amount" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="in_amount"  >Initial Amount</label>
                        <div>
                            <input type="text"  name="in_amount" id="in_amount" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="d_amount"  >Damaged Amount</label>
                        <div>
                            <input type="text"  name="d_amount" id="d_amount" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-xl btn-success mt-3 pl-5 pr-5">Add</button>
                </div>
            </div>
        </form>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
    </body>
</html>
