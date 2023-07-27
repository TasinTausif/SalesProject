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
                                <label for="selling_price" class="form-label">Selling Price:</label>
                                <input type="number" class="form-control" id="selling_price"
                                    aria-describedby="sellingPriceHelp"
                                    value="{{ number_format($product->selling_price, 3) }}" readonly>
                            </div>

                            <label class="form-label"><i>Available Sizes:</i></label>
                            <br>

                            <label class="form-label">S size available:
                                {{ $product->quantity->remaining_s }}</label>
                            <div class="mb-3">
                                <label for="s" class="form-label">S:</label>
                                <input type="number" class="form-control" id="s" aria-describedby="sHelp"
                                    value="{{ old('s') }}" min="0" max="{{ $product->quantity->remaining_s }}"
                                    name="s">
                                @error('s')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="form-label">M size available:
                                {{ $product->quantity->remaining_m }}</label>
                            <div class="mb-3">
                                <label for="m" class="form-label">M:</label>
                                <input type="number" class="form-control" id="m" aria-describedby="mHelp"
                                    value="{{ old('m') }}" min="0" max="{{ $product->quantity->remaining_m }}"
                                    name="m">
                                @error('m')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="form-label">L size available:
                                {{ $product->quantity->remaining_l }}</label>
                            <div class="mb-3">
                                <label for="l" class="form-label">L:</label>
                                <input type="number" class="form-control" id="l" aria-describedby="lHelp"
                                    value="{{ old('l') }}" min="0" max="{{ $product->quantity->remaining_l }}"
                                    name="l">
                                @error('l')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="form-label">XL size available:
                                {{ $product->quantity->remaining_xl }}</label>
                            <div class="mb-3">
                                <label for="xl" class="form-label">XL:</label>
                                <input type="number" class="form-control" id="xl" aria-describedby="xlHelp"
                                    value="{{ old('xl') }}" min="0"
                                    max="{{ $product->quantity->remaining_xl }}" name="xl">
                                @error('xl')
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
