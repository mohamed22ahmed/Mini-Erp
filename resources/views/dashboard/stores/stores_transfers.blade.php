@extends('dashboard.layouts_pages.app')
@section('title')
    Store Transfer
@endsection

@section('page_content')
    <div class="container-fluid">
            <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
                <div style="margin-left: 15px">
                    <h3>Stores Transfer</h3>
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
                                <th>Manager</th>
                                <th>From Store</th>
                                <th>To Store</th>
                                <th>Product Count</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($transfers as $transfer)
                                <tr>
                                    <td>{{ $transfer->admin->username }}</td>
                                    <td>{{ $transfer->fromStore->name }}</td>
                                    <td>{{ $transfer->toStore->name }}</td>
                                    <td>{{ $transfer->product_count}}</td>
                                    <td>{{ $transfer->transfer_date}}</td>
                                    <td>
                                        <a href="#"
                                            data-recObject="{{ json_encode($transfer) }}"
                                            class="btn btn-primary edit-store-transfer-button ">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="store_transfer/delete/{{ $transfer->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
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
                <form method="post" id="student_form" action="{{ route('store_transfer_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>


                        <div class="form-group">
                            <label for="admin_id">Select Admin</label>
                            <select name="admin_id" id="admin_id" class="form-control">
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->username }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="from_store">From Store</label>
                            <select name="from_store" id="from_store" class="form-control">
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="to_store">To Store</label>
                            <select name="to_store" id="to_store" class="form-control">
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="transfer_date">Transfer Date</label>
                            <input type="date" name="transfer_date" id="transfer_date" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="product_count">Product Count</label>
                            <input type="text" name="product_count" id="product_count" class="form-control" />
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

    <div id="edit-store-transfer-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form1" action="{{ route('store_transfer_update') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>


                        <div class="form-group">
                            <label for="admin_id">Select Admin</label>
                            <select name="admin_id" id="admin_id1" class="form-control">
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->username }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="from_store">From Store</label>
                            <select name="from_store" id="from_store1" class="form-control">
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="to_store">To Store</label>
                            <select name="to_store" id="to_store1" class="form-control">
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="transfer_date">Transfer Date</label>
                            <input type="date" name="transfer_date" id="transfer_date1" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="product_count">Product Count</label>
                            <input type="text" name="product_count" id="product_count1" class="form-control" />
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
        });

        $('.edit-store-transfer-button').click(function(e){
            e.preventDefault()
            let store = JSON.parse($(this).attr('data-recObject'))
            console.log(store)
            $('#admin_id1').val(store.admin_id)
            $('#from_store1').val(store.from_store.id)
            $('#to_store1').val(store.to_store.id)
            $('#transfer_date1').val(store.transfer_date)
            $('#product_count1').val(store.product_count)
            $('#id').val(store.id)
            $('#edit-store-transfer-modal').modal('show');
        });
    </script>
@endsection
