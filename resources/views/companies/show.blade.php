@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="text-center">
        <div class="card-header">
                <p><b>{{$company->name}}</b></p>
        </div>
        <div class="card-body">
        @forelse($company->productcompany as $prod)
        <h5 class="card-title">{{ $prod['products'] }}</h5>
        <p class="card-text">{{ $prod['prod_desc'] }}</p>
        @empty
          <h5>no product found</h5>
        @endforelse
        </div>
        <div class="card-footer">
          <a class="btn btn-info" href="/product/{{ $company->id }}/create">Add New Product</a>
        </div>
    </div>
</div>
@endsection
