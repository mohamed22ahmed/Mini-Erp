@extends('dashboard.layouts_pages.app')
@section('title')
    Expenses and Revenues
@endsection

@section('page_content')

<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Expenses and Revenues Operations</h3>
            </div>
            <div>
                <button class="btn btn-success" id="add_data">
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
                                    <th>Expenses Revenues</th>
                                    <th>Branch</th>
                                    <th>Admin</th>
                                    <th>Operation Date</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($exps as $item)
                                    <tr>
                                        <td>{{ $item->income_out->name }}</td>
                                        <td>{{ $item->branch->name }}</td>
                                        <td>{{ $item->admin->username }}</td>
                                        <td>{{ $item->operation_date }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->type == '1'?'In':'Out' }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="#"
                                                data-recObject="{{ json_encode($item) }}"
                                                class="btn btn-primary edit-operations-button btn-sm">
                                                <i fas fa-edit></i>Edit
                                            </a>
                                            <a href="exp_rev/active/{{ $item->id }}" class="btn {{ $item->is_confirmed == '1'? 'btn-success':'btn-danger'}} btn-sm"><i fas fa-active></i>{{ $item->is_confirmed == '0'?'Not Confirmed':'Confirmed' }}</a>
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
                <form method="post" id="student_form"  action="{{ route('exp_rev_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="in_id">Select Expenses Revenues</label>
                            <select name="in_id" id="in_id" class="form-control">
                                @foreach ($in_out as $in)
                                    <option value="{{ $in->id }}">{{ $in->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch_id">Select Branch</label>
                            <select name="branch_id" id="branch_id" class="form-control">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admin_id">Select Admin</label>
                            <select name="admin_id" id="admin_id" class="form-control">
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="operation_date">Enter Operation Date</label>
                            <input type="date" name="operation_date" id="operation_date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="value">Enter Value</label>
                            <input type="text" name="value" id="value" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="type">Enter Type(in , out)</label>
                            <select name="type" id="type" class="form-control">
                                <option value="1">In</option>
                                <option value="2">Out</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">write Descriptions</label>
                            <textarea name="description" id="description" class="form-control" style="height:120px"></textarea>
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

    <div id="edit-operations-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form1"  action="{{ route('exp_rev_update') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="in_id">Select Expenses Revenues</label>
                            <select name="in_id" id="in_id1" class="form-control">
                                @foreach ($in_out as $in)
                                    <option value="{{ $in->id }}">{{ $in->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="branch_id">Select Branch</label>
                            <select name="branch_id" id="branch_id1" class="form-control">
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admin_id">Select Admin</label>
                            <select name="admin_id" id="admin_id1" class="form-control">
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="operation_date">Enter Operation Date</label>
                            <input type="date" name="operation_date" id="operation_date1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="value">Enter Value</label>
                            <input type="text" name="value" id="value1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="type">Enter Type(in , out)</label>
                            <select name="type" id="type1" class="form-control">
                                <option value="1">In</option>
                                <option value="2">Out</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">write Descriptions</label>
                            <textarea name="description" id="description1" class="form-control" style="height:120px"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="" >
                        <input type="submit" name="submit" id="action" value="Save" class="btn btn-info" />
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

                $('.edit-operations-button').click(function(e){
                    e.preventDefault()
                    let operation = JSON.parse($(this).attr('data-recObject'))
                    console.log(operation)
                    $('#in_id1').val(operation.income_out_id)
                    $('#branch_id1').val(operation.branch_id)
                    $('#admin_id1').val(operation.admin_id)
                    $('#operation_date1').val(operation.operation_date)
                    $('#value1').val(operation.value)
                    $('#type1').val(operation.type)
                    $('#description1').val(operation.description)
                    $('#id').val(operation.id)
                    $('#edit-operations-modal').modal('show');
                });
            });
        </script>
@endsection
