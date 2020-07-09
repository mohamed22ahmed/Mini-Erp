@extends('dashboard.layouts_pages.app')
@section('title')
    Recharge Values
@endsection

@section('page_content')

<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Recharge Values</h3>
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
                                <th>Company</th>
                                <th>City</th>
                                <th>Value</th>
                                <th>Notes</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($rech_values as $rec)
                                <tr>
                                    <td>{{ $rec->rec_company->name }}</td>
                                    <td>{{ $rec->city->name }}</td>
                                    <td>{{ $rec->value }}</td>
                                    <td>{{ $rec->notes }}</td>
                                    <td>
                                        <a href="/dashboard/recharge_value/update"
                                            data-recObject="{{ json_encode($rec) }}"
                                            class="btn btn-primary edit-rec-value-button">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="/dashboard/recharge_value/delete/{{ $rec->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
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
                <form method="post" id="student_form" action="{{ route('recharge_value_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Select Company</label>
                            <select name="company_id" id="company_id" class="form-control">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select City</label>
                            <select name="city_id" id="city_id" class="form-control">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter Value</label>
                            <input type="number" name="value" id="value" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="notes">write Notes</label>
                            <textarea name="notes" id="notes" class="form-control" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="edit-rec-value-id">
                        <input type="submit" name="submit" id="action" value="Save" class="btn btn-info" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="edit-rec-value-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form" action="{{ route('recharge_value_update') }}">
                    @csrf
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label>Select Company</label>
                            <select name="company_id" id="edit_company_id" class="form-control">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select City</label>
                            <select name="city_id" id="edit_city_id" class="form-control">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter Value</label>
                            <input type="number" name="value" id="edit_value" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="notes">write Notes</label>
                            <textarea name="notes" id="edit_notes" class="form-control" style="height:120px"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="edit-rec-value-idx">
                        <input type="submit" name="submit" id="xaction" value="Save" class="btn btn-info" />
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

            $('.edit-rec-value-button').click(function(e){
                e.preventDefault()
                let rec_value = JSON.parse($(this).attr('data-recObject'))
                console.log(rec_value)
                $('#edit_company_id').val(rec_value.Rec_company_id)
                $('#edit_city_id').val(rec_value.city_id)
                $('#edit_value').val(rec_value.value)
                $('#edit_notes').val(rec_value.notes)
                $('#edit-rec-value-idx').val(rec_value.id)
                $('#edit-rec-value-modal').modal('show');
            });
        });
    </script>
@endsection

