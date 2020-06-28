@extends('dashboard.layouts_pages.app')
@section('title')
    Mandoop
@endsection

@section('page_content')
    <div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Mandoop</h3>
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
                                    <th>Branch</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Percentage</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($mandoops as $mandoop)
                                <tr>
                                    <td>{{ $mandoop->name }}</td>
                                    <td>{{ $mandoop->branch->name }}</td>
                                    <td>{{ $mandoop->email }}</td>
                                    <td>{{ $mandoop->phone }}</td>
                                    <td>{{ $mandoop->address }}</td>
                                    <td>{{ $mandoop->percentage }}</td>
                                    <td>{{ $mandoop->notes }}</td>
                                    <td>
                                        <a href="mandoop/edit/{{ $mandoop->id }}" class="btn btn-primary"><i fas fa-edit></i>Edit</a>
                                        <a href="mandoop/delete/{{ $mandoop->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
                                        <a href="mandoop/active/{{ $mandoop->id }}" class="btn btn-{{ $mandoop->is_active=='1'?'success':'danger'}}"><i fas fa-active></i>{{ $mandoop->is_active=='1'?'Active':'Inactive'}}</a>
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
                <form method="post" id="student_form" action="{{ route('mandoop_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
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
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Address</label>
                            <input type="text" name="address" id="address" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>Enter Percentage</label>
                            <input type="number" name="percentage" id="percentage" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="notes">write Notes</label>
                            <textarea name="notes" id="notes" class="form-control" style="height:120px"></textarea>
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
                $('#student_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Data');
            });
        });
    </script>
@endsection