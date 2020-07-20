@extends('dashboard.layouts_pages.app')
@section('title')
    Create Product
@endsection

@section('page_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="mb-3 text-center d-flex justify-content-center">
                @if(session('unit_form_store'))
                    <div class="alert col-sm-6 text-center alert-{{session('store_unit_message_type') == 'success' ?  'success'  :  'danger' }}"
                        role="alert">
                        {{session('store_unit_message')}}
                    </div>
                @endif
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- general form elements disabled -->
                        <div class="card card-success">
                            <div class="card-header ">
                                <h3 class="card-title " >Create Product </h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">

                                    <form role="form" method="POST" action="{{route('products.store')}}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name : </label>
                                                    <input  type="text"
                                                            value="{{old('name')}}"
                                                            class="form-control"
                                                            placeholder="Name"
                                                            id="#name"
                                                            name="name" >
                                                </div>
                                                @if($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.name -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-control select-search "
                                                            style="width: 100%;" id="add-product-category-id"
                                                            name="category_id"  >
                                                        @foreach ($categories as $category)
                                                            <option value="percent"
                                                                    {{old('category_id') === $category->id ? 'selected' : ''}}>
                                                                {{$category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if($errors->has('category_id'))
                                                    <span class="text-danger">{{ $errors->first('category_id') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.category_id -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Store</label>
                                                    <select class="form-control select-search "
                                                            style="width: 100%;" id="add-product-store-id"
                                                            name="store_id"  >
                                                        @foreach ($stores as $store)
                                                        <option value="percent" {{old('store_id') === $store->id ? 'selected' : ''}}>{{$store->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if($errors->has('store_id'))
                                                    <span class="text-danger">{{ $errors->first('store_id') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.store_id -->


                                        <div class="row">
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label for="name">Description : </label>
                                                <textarea class="form-control" rows="3" placeholder="Description" name="description" >{{old('description')}}</textarea>
                                              </div>
                                              @if($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}
                                                </span>
                                            @endif
                                            </div>
                                        </div>{{-- ./description --}}

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Current Amount : </label>
                                                    <input  type="number"
                                                            value="{{old('current_amount')}}"
                                                            class="form-control"
                                                            placeholder="Current Amount"
                                                            name="current_amount" >
                                                </div>
                                                @if($errors->has('current_amount'))
                                                    <span class="text-danger">{{ $errors->first('current_amount') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.current_amount -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Minimum Amount : </label>
                                                    <input  type="number"
                                                            value="{{old('minimum_amount')}}"
                                                            class="form-control"
                                                            placeholder="Minimum Amount"
                                                            name="minimum_amount"  >
                                                </div>
                                                @if($errors->has('minimum_amount'))
                                                    <span class="text-danger">{{ $errors->first('minimum_amount') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.minimum_amount -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Initial Amount : </label>
                                                    <input  type="number"
                                                            value="{{old('initial_amount')}}"
                                                            class="form-control"
                                                            placeholder="Initial Amount"
                                                            name="initial_amount"  >
                                                </div>
                                                @if($errors->has('initial_amount'))
                                                    <span class="text-danger">{{ $errors->first('initial_amount') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.initial_amount -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Damaged Amount : </label>
                                                    <input  type="number"
                                                            value="{{old('damaged_amount')}}"
                                                            class="form-control"
                                                            placeholder="Damaged Amount"
                                                            name="damaged_amount"  >
                                                </div>
                                                @if($errors->has('damaged_amount'))
                                                    <span class="text-danger">{{ $errors->first('damaged_amount') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div><!-- /.damaged_amount -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input" name="active"
                                                                id="add-item-active-checkbox"  {{old('active')  ? 'checked ' : ''}}  >
                                                        <label class="custom-control-label" for="add-item-active-checkbox" >Active</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.Active -->

                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for="product-image-input">Photo</label>
                                                <div class="input-group">
                                                  <div class="custom-file">
                                                    <input type="file" name="photo" class="custom-file-input" id="product-image-input">
                                                    <label class="custom-file-label" for="product-image-input">Choose file</label>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>{{-- ./pic --}}

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>

                                    </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col   -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js-after-main')
<script src="{{ asset('dashboard_files/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection
