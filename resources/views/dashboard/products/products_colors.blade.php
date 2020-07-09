@extends('dashboard.layouts_pages.app')
@section('title')
    Product Colors
@endsection

@section('page_content')
<div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Product Colors</h3>
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
                                <th>Product</th>
                                <th>Color</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($product_colors as $pr_cl)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    {{--  <td>{{ $pr_cl->product->name }}</td>
                                    <td>{{ $pr_cl->$color->name }}</td>  --}}

                                    <td>
                                        <a href="#"
                                            data-recObject="{{ json_encode($pr_cl) }}"
                                            class="btn btn-primary edit-product-color-button ">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="product_color/delete/{{ $pr_cl->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
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
                <form method="post" id="student_form" action="{{ route('product_color_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="product_id">Select Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color_id">Select Color</label>
                            <select name="color_id" id="color_id" class="form-control">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
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

    <div id="edit-product-color-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form1" action="{{ route('product_color_update') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="product_id">Select Product</label>
                            <select name="product_id" id="product_id1" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color_id">Select Color</label>
                            <select name="color_id" id="color_id1" class="form-control">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
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

            $('.edit-product-color-button').click(function(e){
                e.preventDefault()
                let store = JSON.parse($(this).attr('data-recObject'))
                console.log(store)
                $('#color_id1').val(store.color_id)
                $('#product_id1').val(store.product_id)
                $('#id').val(store.id)
                $('#edit-product-color-modal').modal('show');
            });
        });
    </script>
@endsection
