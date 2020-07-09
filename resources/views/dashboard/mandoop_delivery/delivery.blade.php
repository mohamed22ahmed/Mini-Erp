@extends('dashboard.layouts_pages.app')
@section('title')
    Deliveries
@endsection

@section('page_content')
<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Delivery</h3>
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
                                    <th>Salary</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($deliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery->name }}</td>
                                    <td>{{ $delivery->branch->name }}</td>
                                    <td>{{ $delivery->email }}</td>
                                    <td>{{ $delivery->phone }}</td>
                                    <td>{{ $delivery->address }}</td>
                                    <td>{{ $delivery->salary }}</td>
                                    <td>{{ $delivery->notes }}</td>
                                    <td>
                                        <a href="#"
                                            data-recObject="{{ json_encode($delivery) }}"
                                            class="btn btn-primary edit-client-button ">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="delivery/delete/{{ $delivery->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
                                        <a href="delivery/active/{{ $delivery->id }}" class="btn btn-{{ $delivery->is_active=='1'?'success':'danger'}}"><i fas fa-active></i>{{ $delivery->is_active=='1'?'Active':'Inactive'}}</a>
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
                <form method="post" id="student_form" action="{{ route('delivery_insert') }}">
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
                            <label>Enter Salary</label>
                            <input type="number" name="salary" id="salary" class="form-control" />
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

    <div id="edit-client-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form1" action="{{ route('delivery_update') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input type="text" name="name" id="name1" class="form-control" />
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
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Phone</label>
                            <input type="text" name="phone" id="phone1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Address</label>
                            <input type="text" name="address" id="address1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Salary</label>
                            <input type="number" name="salary" id="salary1" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="notes">write Notes</label>
                            <textarea name="notes" id="notes1" class="form-control" style="height:120px"></textarea>
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
                $('#name1').val(store.name)
                $('#branch_id1').val(store.branch.id)
                $('#email1').val(store.email)
                $('#phone1').val(store.phone)
                $('#address1').val(store.address)
                $('#salary1').val(store.salary)
                $('#notes1').val(store.notes)
                $('#id').val(store.id)
                $('#edit-client-modal').modal('show');
            });
        });
    </script>
@endsection
