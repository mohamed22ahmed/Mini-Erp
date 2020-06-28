@extends('dashboard.layouts_pages.app')
@section('title')
    Recharge Companies
@endsection

@section('page_content')

<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Recharge Companies</h3>
            </div>
            <div>
                <button class="btn btn-success" id="add_data" onclick="{{ session()->forget('record') }}">
                    Add
                    <i class="fa fa-user-plus fa-fw"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="overflow-x:auto !important">
                    <table class="table table-hover table-striped table-bordered text-center w-100 mobile-optimised">
                        <tbody>
                            <tr>
                                <th>Branch</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($rech_companies as $rec)
                                <tr>

                                    <input type="hidden" name="test" value="{{ $rec->id }}">
                                    <td>{{ $rec->branch->name }}</td>
                                    <td>{{ $rec->name }}</td>
                                    <td>{{ $rec->address }}</td>
                                    <td>{{ $rec->phone }}</td>
                                    <td>{{ $rec->email }}</td>
                                    <td>
                                        <a href="/dashboard/recharge_company/edit/{{ $rec->id }}" id="edit_data" class="btn btn-primary"><i fas fa-edit></i>Edit</a>
                                        <a href="/dashboard/recharge_company/delete/{{ $rec->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
                                        <a href="/dashboard/recharge_company/active/{{ $rec->id }}" class="btn {{ $rec->is_active==1?'btn-success':'btn-danger' }}"><i fas fa-active></i>{{ $rec->is_active==1?'Active':'Inactive' }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="sss" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form" action="{{ route('recharge_company_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" value=" {{empty($r = session('record'))? " " : $r =  session('record')  }}" >
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Select Branch ID</label>
                            <select name="branch_id" id="branch_id" class="form-control">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                            value="{{empty($r->name)?'': $r->name}}">

                        </div>
                        <div class="form-group">
                            <label>Enter Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ empty($r->address)?'': $r->address }}">
                        </div>
                        <div class="form-group">
                            <label>Enter Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ empty($r->phone)?'': $r->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ empty($r->email)?'': $r->email }}">
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

    <script type="text/javascript">
            $(document).ready(function() {
                $('#add_data').click(function(){
                    $('#sss').modal('show');
                });

                $('#edit_data').click(function(){
                    $('#sss').modal('show');
                    event.preventDefault()
                });
            });
        </script>
@endsection

