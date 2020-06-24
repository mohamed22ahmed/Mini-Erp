@extends('dashboard.layouts_pages.app')
@section('title')
    Products
@endsection

@section('page_content')

<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Products</h3>
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
                                <th>Store</th>
                                <th>Category</th>
                                <th>Photo</th>
                                <th>Current Amount</th>
                                <th>Minimum Amount</th>
                                <th>Initial Amount</th>
                                <th>Damaged Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>oppo</td>
                                <td>Cairo</td>
                                <td>Phones</td>
                                <td><img src=""></td>
                                <td>20</td>
                                <td>5</td>
                                <td>100</td>
                                <td>3</td>
                                <td>chines phones</td>
                                <td>
                                    <a href="ss/edit/id" class="btn btn-primary btn-sm"><i fas fa-edit></i>Edit</a>
                                    <a href="ss/delete/id" class="btn btn-danger btn-sm"><i fas fa-delete></i>Delete</a>
                                    <a href="ss/active/id" class="btn btn-success btn-sm"><i fas fa-active></i>Active</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="sss" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="store_id">Select Store_ID</label>
                            <select name="store_id" id="store_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="cat_id">Select Category_ID/label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Address</label>
                            <input type="file" name="photo" id="photo" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="desc">write Descriptions</label>
                            <textarea name="" id="desc" class="form-control" style="height:300px"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="is-active">Is Active</label>
                            <input type="text" name="is-active" id="is-active" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="current-amount">Current Amount</label>
                            <input type="text" name="current-amount" id="current-amount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="min-amount">Minimum Amount</label>
                            <input type="text" name="Minimum-amount" id="min-amount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="in-amount">Initial Amount</label>
                            <input type="text" name="initial-amount" id="in-amount" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="dam-amount">Damaged Amount</label>
                            <input type="text" name="damaged-amount" id="dam-amount" class="form-control" />
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
