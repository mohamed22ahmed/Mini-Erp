@extends('dashboard.layouts_pages.app')
@section('title')
    Admins
@endsection

@section('page_content')
<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Admins</h3>
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
                                    <th>Name</th>
                                    {{--  <th>Branch</th>  --}}
                                    <th>Email</th>
                                    <th>User Type</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->username }}</td>
                                    {{--  <td>{{ $admin->branch->name }}</td>  --}}
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->type }}</td>
                                    <td>
                                        <a href="#"
                                            data-recObject="{{ json_encode($admin) }}"
                                            class="btn btn-primary edit-client-button ">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="delivery/delete/{{ $admin->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
                                        <a href="delivery/active/{{ $admin->id }}" class="btn btn-{{ $admin->is_active=='1'?'success':'danger'}}"><i fas fa-active></i>{{ $admin->is_active=='1'?'Active':'Inactive'}}</a>
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
                <form method="post" id="student_form" action="{{ route('admin_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Enter Username</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="admin_type">Admin Type</label>
                            <select name="admin_type" id="admin_type" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
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

    <div id="edit-client-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form1" action="{{ route('admin_update') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Enter Username</label>
                            <input type="text" name="name" id="name1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" name="password" id="password1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="admin_type">Admin Type</label>
                            <select name="admin_type" id="admin_type1" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
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

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value="" />
                        <input type="submit" name="submit" id="action1" value="Save" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#add_data').click(function(){
                $('#sss').modal('show');
            });

            $('.edit-client-button').click(function(e){
                e.preventDefault()
                let store = JSON.parse($(this).attr('data-recObject'))
                console.log(store)
                $('#name1').val(store.username)
                $('#email1').val(store.email)
                //$('#branch_id1').val(store.branch.id)
                $('#admin_type').val(store.super_admin)
                $('#id').val(store.id)
                $('#edit-client-modal').modal('show');
            });
        });
    </script>
@endsection
