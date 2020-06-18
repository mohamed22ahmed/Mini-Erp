@extends('dashboard.layouts_pages.app')
@section('title')
    Company Info
@endsection

@section('page_content')
<div class="container">
    <div class="card-header"><h3>@lang('dashboard.company_page')</h3></div>

    <form method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="inputName2"  >Select Branch</label>
                    <select name="branch_id" id="branch_id" class="form-group">
                        <option value="-1">Choose</option>
                        <option value="1">4Soft</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName2"  >Enter Name</label>
                    <div>
                        <input type="text"  name="name" id="name" class="form-control" placeholder="Enter Name">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputName2"  >Enter Address</label>
                    <div>
                        <input type="text"  name="address" id="address" class="form-control" placeholder="Enter Address">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName2"  >Enter Email</label>
                    <div>
                        <input type="email"  name="email" id="email" class="form-control" placeholder="Enter Email">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputName2"  >Enter Phone</label>
                    <div>
                        <input type="text"  name="phone" id="phone" class="form-control" placeholder="Enter Phone">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
            </div><br>
        </div><hr>
        <div class="card-foot">
            <div class="row " style="float:right;margin-right:10px">
                <button type="submit" class="btn btn-xl btn-success">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
