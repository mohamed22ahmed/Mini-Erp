@extends('dashboard.layouts_pages.app')
@section('title')
    Company Info
@endsection

@section('page_content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="float: left">
                        <h4>Recharge Companies</h4>
                    </div>

                    <div class="card-tools" style="float: right; margin-right:5px">
                        <a class="btn btn-success" href="/dashboard/recharge_company/add">
                            Add
                            <i class="fa fa-user-plus fa-fw"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
