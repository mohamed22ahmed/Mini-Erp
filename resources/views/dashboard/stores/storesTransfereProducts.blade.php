@extends('dashboard.layouts_pages.app')
@section('title')
    Transfer Products
@endsection

@section('page_content')

    <div class="container-fluid">
        <div class="text-center mb-5 mt-4 d-flex justify-content-between xoo" >
            <div style="margin-left: 15px">
                <h3>Stores Transfer Products</h3>
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
                                <th>Store Transfer</th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($stroe_products as $st_pr)
                                <tr>
                                    <td>{{ $st_pr->store->name }}</td>
                                    <td>{{ $st_pr->product->name }}</td>
                                    <td>{{ $st_pr->amount }}</td>
                                    <td>
                                        <a href="#"
                                            data-recObject="{{ json_encode($st_pr) }}"
                                            class="btn btn-primary edit-store-product-button ">
                                            <i fas fa-edit></i>Edit
                                        </a>
                                        <a href="store_products/delete/{{ $st_pr->id }}" class="btn btn-danger"><i fas fa-delete></i>Delete</a>
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
                <form method="post" id="student_form" action="{{ route('store_products_insert') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Add Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="transfer_id">Select Transfer</label>
                            <select name="transfer_id" id="transfer_id" class="form-control">
                                @foreach ($transfers as $transfer)
                                    <option value="{{ $transfer->id }}">{{ $transfer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_id">Select Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control" />
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

    <div id="edit-store-product-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" id="student_form1" action="{{ route('store_products_update') }}">
                    <div class="modal-header d-flex justify-content-between">
                            <h4 class="modal-title">Update Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="form-group">
                            <label for="transfer_id">Select Transfer</label>
                            <select name="transfer_id" id="transfer_id1" class="form-control">
                                @foreach ($transfers as $transfer)
                                    <option value="{{ $transfer->id }}">{{ $transfer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_id">Select Product</label>
                            <select name="product_id" id="product_id1" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount1" class="form-control" />
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

                $('.edit-store-product-button').click(function(e){
                    e.preventDefault()
                    let store = JSON.parse($(this).attr('data-recObject'))
                    console.log(store)
                    $('#transfer_id1').val(store.store.id)
                    $('#product_id1').val(store.product.id)
                    $('#amount1').val(store.amount)
                    $('#id').val(store.id)
                    $('#edit-store-product-modal').modal('show');
                });
            });
        </script>
@endsection
