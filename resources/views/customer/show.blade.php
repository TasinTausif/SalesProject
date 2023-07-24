@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product Details') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('customer.update', $product->id) }}">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="product_id" class="form-label">Product ID:</label>
                                <input type="text" class="form-control" id="product_id" aria-describedby="productIdHelp"
                                    value="{{ $product->product_id }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="supplier" class="form-label">Supplier Name: </label>
                                <input type="text" class="form-control" id="supplier" aria-describedby="supplierHelp"
                                    value="{{ $product->user->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name:</label>
                                <input type="text" class="form-control" id="product_name"
                                    aria-describedby="productNameHelp" value="{{ $product->product_name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-label">Size:</label>
                                <input type="text" class="form-control" id="size" aria-describedby="sizeHelp"
                                    value="{{ $product->size }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="selling_price" class="form-label">Selling Price:</label>
                                <input type="number" class="form-control" id="selling_price"
                                    aria-describedby="sellingPriceHelp" value="{{ $product->selling_price }}" readonly>
                            </div>


                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" aria-describedby="quantityHelp" name="quantity"
                                    value="{{ old('quantity') }}" min="1" max="{{ $product->remaining }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
