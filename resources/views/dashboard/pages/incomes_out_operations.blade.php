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
                        <h4>Incomes Out Operations</h4>
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
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
                                <th>mm</th>
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
