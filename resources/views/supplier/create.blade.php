@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('supplier.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="product_id" class="form-label">Product ID:</label>
                                <input type="text" class="form-control @error('product_id') is-invalid @enderror"
                                    id="product_id" aria-describedby="productIdHelp" name="product_id"
                                    value="{{ old('product_id') }}">
                                @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name:</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    id="product_name" aria-describedby="productNameHelp" name="product_name"
                                    value="{{ old('product_name') }}">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" aria-describedby="quantityHelp" name="quantity"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-label">Size:</label>

                                <select name="size" id="size"
                                    class="form-control @error('size') is-invalid @enderror" aria-describedby="sizeHelp">
                                    <option value="s">Small</option>
                                    <option value="m">Medium</option>
                                    <option value="l">Large</option>
                                    <option value="xl">Extra Large</option>
                                </select>
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="buying_price" class="form-label">Buying Price:</label>
                                <input type="number" class="form-control @error('buying_price') is-invalid @enderror"
                                    id="buying_price" aria-describedby="buyingPriceHelp" name="buying_price"
                                    value="{{ old('buying_price') }}">
                                @error('buying_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
