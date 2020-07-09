@extends('dashboard.layouts_pages.app')
@section('title')
    Clients
@endsection

@section('page_content')
    <div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Clients</h3>
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
                                <th>Client Type</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->branch->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->user_type=='1'?'Current':'Expected' }}</td>
                                    <td>{{ $client->notes }}</td>
                                    <td>
                                        <a href="#"
                                            data-recObject="{{ json_encode($client) }}"
                                            class="btn btn-primary edit-client-button ">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="client/delete/{{ $client->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
                                        <a href="client/active/{{ $client->id }}" class="btn btn-{{ $client->is_active=='1'?'success':'danger'}}"><i fas fa-active></i>{{ $client->is_active=='1'?'Active':'Inactive'}}</a>
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
                <form method="post" id="student_form" action="{{ route('client_insert') }}">
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
                            <label for="client_type">Select Client Type</label>
                            <select name="client_type" id="sel" class="form-control exp-class">
                                <option value="1">Current</option>
                                <option value="2" class="exp">Expected</option>
                            </select>
                        </div>
                        <!-- --  the 2 inputs placed under  this commit displays when the user_type is Expected  -- -->

                        <div class="form-group" id="hide" style="display:none">
                            <div class="form-group">
                                <label>Expected Date</label>
                                <input type="date" name="exp_date" id="exp_date" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Alert Before Hours</label>
                                <input type="number" name="alert_hours" id="alert_hours" class="form-control" />
                            </div>

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
                <form method="post" id="student_form1" action="{{ route('client_update') }}">
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
                            <label for="client_type">Select Client Type</label>
                            <select name="client_type" id="sel1" class="form-control exp-class">
                                <option value="1">Current</option>
                                <option value="2" class="exp">Expected</option>
                            </select>
                        </div>
                        <!-- --  the 2 inputs placed under  this commit displays when the user_type is Expected  -- -->

                        <div class="form-group" id="hide1" style="display:none">
                            <div class="form-group">
                                <label>Expected Date</label>
                                <input type="date" name="exp_date" id="exp_date1" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Alert Before Hours</label>
                                <input type="number" name="alert_hours" id="alert_hours1" class="form-control" />
                            </div>

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
        $(document).ready(function() {
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
                $('#sel1').val(store.user_type)
                $('#exp_date1').val(store.expected_user_date)
                $('#alert_hours1').val(store.alert_after_hours)
                $('#notes1').val(store.notes)
                $('#id').val(store.id)
                $('#edit-client-modal').modal('show');
            });
        });
    </script>

    <script>
        var sel    =  document.getElementById('sel'),
        hide   = document.getElementById('hide');
        sel.onchange = function(){
            if(this.value==='Expected')
            {
                hide.style.display='block';
            }
            else
            {
                hide.style.display='none';
            }
        }
    </script>
@endsection
