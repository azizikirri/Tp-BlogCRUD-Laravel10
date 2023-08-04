@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Product</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if($product->count() > 0)
                    @foreach($product as $rs)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $rs->title }}</h5>
                                    <p class="card-text">{{ $rs->description }}</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Price: {{ $rs->price }}</li>
                                        <li class="list-group-item">Product Code: {{ $rs->product_code }}</li>
                                    </ul>
                                    <div class="mt-3">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('product.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('product.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('product.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">Product not found</div>
                @endif
            </div>
        </div>
    </div>
@endsection
