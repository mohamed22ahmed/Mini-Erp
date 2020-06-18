@extends('dashboard.layouts_pages.app')
@section('title')
    Company Info
@endsection

@section('page_content')
<div class="container">
    <div class="card-header"><h3>@lang('dashboard.company_page')</h3></div>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName2"  >Company Name</label>
                    <div>
                        <input type="text"  name="name" id="name" class="form-control" value="{{ $data->name }}">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputName2"  >Company Phone</label>
                    <div>
                        <input type="text"  name="phone" id="phone" class="form-control" value="{{ $data->phone }}">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputName2"  >Company Email</label>
                    <div>
                        <input type="email"  name="email" id="email" class="form-control" value="{{ $data->email }}">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputName2"  >Trade Id</label>
                    <div>
                        <input type="text"  name="trad_id" id="trad_id" class="form-control" value="{{ $data->trad_id }}">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('trad_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputName2"  >Tax Id</label>
                    <div>
                        <input type="text"  name="tax_id" id="tax_id" class="form-control" value="{{ $data->tax_id }}">
                        @if($errors->any())
                            <span style="color: red">{{ $errors->first('tax_id') }}</span>
                        @endif
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group col-md-6">
                    <div>
                        <input type="file"  name="logo" id="logo" class="form-control">
                    </div>
                </div>
            </div>
        </div><hr>
        <div class="card-foot">
            <div class="row " style="float:right;margin-right:10px">
                <button type="submit" class="btn btn-xl btn-success">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
