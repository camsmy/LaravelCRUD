@extends('layouts.app')

@section('content')
<h1>add new product</h1>
<form action="/product/{{ $company_id }}/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="company_id" class="form-control" value="{{ $company_id }}" hidden>
                <input type="text" name="products" class="form-control" placeholder="Product Name">
                @error('products')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="prod_desc" class="form-control" placeholder="Description">
                @error('prod_desc')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection