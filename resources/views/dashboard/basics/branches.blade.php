@extends('dashboard.basics.app')

@section('title')
    Branches
@endsection

@section('page_header')
    Branch Page
@endsection

@section('button_name')
    Add New Branch
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div style="overflow-x:auto !important">
                    <table id="student_table" class="table table-hover table-striped table-bordered text-center w-100 mobile-optimised">
                        <thead>
                            <tr>
                                <th>@lang('dashboard.admin')</th>
                                <th>@lang('dashboard.name')</th>
                                <th>@lang('dashboard.address')</th>
                                <th>@lang('dashboard.phone')</th>
                                <th>@lang('dashboard.email')</th>
                                <th>@lang('dashboard.action')</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="studentModal" class="modal fade" role="dialog">
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
                            <label>Select Admin</label>
                            <select class="form-control"name="admin_id" id="admin_id">
                                <option>Ahmed</option>
                                <option>Mohamed</option>
                                <option>Mahmoud</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Address</label>
                            <input type="text" name="address" id="address" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" name="email" id="email" class="form-control" />
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
    </div>
    </div>
    </div>
    </div>
@endsection


@section('foo')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#student_table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('branches.getdata') }}",
                "columns":[
                    { "data": "admin_id" },
                    { "data": "name" },
                    { "data": "address" },
                    { "data": "phone" },
                    { "data": "email" },
                    { "data": "action", orderable:false, searchable: false}
                ]
            });

            $('#add_data').click(function(){
                $('#studentModal').modal('show');
                $('#student_form')[0].reset();
                $('#form_output').html('');
                $('#button_action').val('insert');
                $('#action').val('Add');
                $('.modal-title').text('Add Data');
            });

            $('#student_form').on('submit', function(event){
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url:"{{ route('branches.postdata') }}",
                    method:"POST",
                    data:form_data,
                    dataType:"json",
                    success:function(data)
                    {
                        if(data.error.length > 0)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                            }
                            $('#form_output').html(error_html);
                        }
                        else
                        {
                            $('#form_output').html(data.success);
                            $('#student_form')[0].reset();
                            $('#action').val('Add');
                            $('.modal-title').text('Add Data');
                            $('#button_action').val('insert');
                            $('#student_table').DataTable().ajax.reload();
                        }
                    }
                })
            });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr("id");
                $('#form_output').html('');
                $.ajax({
                    url:"{{route('branches.fetchdata')}}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#admin_id').val(data.admin_id);
                        $('#name').val(data.name);
                        $('#address').val(data.address);
                        $('#phone').val(data.phone);
                        $('#email').val(data.email);

                        $('#student_id').val(id);
                        $('#studentModal').modal('show');
                        $('#action').val('Edit');
                        $('.modal-title').text('Edit Data');
                        $('#button_action').val('update');
                    }
                })
            });

            $(document).on('click', '.delete', function(){
                var id = $(this).attr('id');
                if(confirm("Are you sure you want to Delete this data?"))
                {
                    $.ajax({
                        url:"{{route('branches.removedata')}}",
                        mehtod:"get",
                        data:{id:id},
                        success:function(data)
                        {
                            alert(data);
                            $('#student_table').DataTable().ajax.reload();
                        }
                    })
                }
                else
                {
                    return false;
                }
            });
            $(document).on('click', '.active', function(){
                var id = $(this).attr('id');

                $.ajax({
                    url:"{{route('branches.active')}}",
                    mehtod:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        $('#student_table').DataTable().ajax.reload();
                    }
                })
            });
        });
    </script>
@endsection



