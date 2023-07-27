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
                                <label for="quantity_id" class="form-label">Select Quantity First : </label>
                                <a href="{{ route('supplier.quantity') }}" class="btn btn-info mb-2 mx-3">Quantity</a>
                                <input type="number"
                                    class="d-inline @error('quantity_id') is-invalid @enderror form-control"
                                    id="quantity_id" aria-describedby="quantityIdHelp" name="quantity_id"
                                    value="{{ request()->get('s') + request()->get('m') + request()->get('l') + request()->get('xl') }}"
                                    readonly>
                                <input type="hidden" name="s" value="{{ request()->get('s') }}">
                                <input type="hidden" name="m" value="{{ request()->get('m') }}">
                                <input type="hidden" name="l" value="{{ request()->get('l') }}">
                                <input type="hidden" name="xl" value="{{ request()->get('xl') }}">
                                @error('quantity_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

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
                                <label for="buying_price" class="form-label">Buying Price:</label>
                                <input type="number" class="form-control @error('buying_price') is-invalid @enderror"
                                    id="buying_price" aria-describedby="buyingPriceHelp" name="buying_price"
                                    value="{{ old('buying_price') }}" min="1">
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
