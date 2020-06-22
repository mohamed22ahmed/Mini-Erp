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
                        <h4>Products Colors</h4>
                    </div>

                    <div class="card-tools" style="float: right; margin-right:5px">
                        <button class="btn btn-success" id="add_data">
                            Add
                            <i class="fa fa-user-plus fa-fw"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Product</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>oppo</td>
                                <td>red</td>
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
                            <label for="product_id">Select Product_ID</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color_id">Select Color_ID</label>
                            <select name="color_id" id="color_id" class="form-control">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
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
