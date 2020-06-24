@extends('dashboard.layouts_pages.app')
@section('title')
    Expenses and Revenues
@endsection

@section('page_content')

<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Product Discounts</h3>
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
                                    <th>Date</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>Expenses</td>
                                    <td>Cairo</td>
                                    <td>Mohamed</td>
                                    <td>25/5/2020</td>
                                    <td>250</td>
                                    <td>In</td>
                                    <td>phone for you</td>
                                    <td>
                                        <a href="ss/edit/id" class="btn btn-primary"><i fas fa-edit></i>Edit</a>
                                        <a href="ss/delete/id" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
                                        <a href="ss/active/id" class="btn btn-success"><i fas fa-active></i>Active</a>
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
                            <label for="In_id">Select In_Out_ID</label>
                            <select name="In_id" id="In_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Branch_id">Select Branch_ID</label>
                            <select name="Branch_id" id="Branch_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Select User_ID</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Enter Date</label>
                            <input type="text" name="date" id="date" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="value">Enter Value</label>
                            <input type="text" name="value" id="value" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="desc">write Descriptions</label>
                            <textarea name="" id="desc" class="form-control" style="height:300px"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Enter Type(in , out)</label>
                            <input type="text" name="type" id="type" class="form-control" />
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
