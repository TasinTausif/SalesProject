@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('supplier.update', $product->id) }}">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="user_id" class="form-label">User: </label>
                                <input type="text" class="form-control" id="user_id" aria-describedby="userIdHelp"
                                    name="user_id" value="{{ $product->user->name }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="product_id" class="form-label">Product ID:</label>
                                <input type="text" class="form-control" id="product_id" aria-describedby="productIdHelp"
                                    name="product_id" value="{{ $product->product_id }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name:</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    id="product_name" aria-describedby="productNameHelp" name="product_name"
                                    value="{{ $product->product_name }}">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" aria-describedby="quantityHelp" name="quantity"
                                    value="{{ $product->quantity }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-label">Size:</label>

                                <select name="size" id="size"
                                    class="form-control @error('size') is-invalid @enderror" aria-describedby="sizeHelp">
                                    <option value="s" @if ('s' == $product->size) selected @endif>Small</option>
                                    <option value="m" @if ('m' == $product->size) selected @endif>Medium</option>
                                    <option value="l" @if ('l' == $product->size) selected @endif>Large</option>
                                    <option value="xl" @if ('xl' == $product->size) selected @endif>Extra Large
                                    </option>
                                </select>
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="buying_price" class="form-label">Buying Price:</label>
                                <input type="number" class="form-control @error('buying_price') is-invalid @enderror"
                                    id="buying_price" aria-describedby="buyingPriceHelp" name="buying_price"
                                    value="{{ $product->buying_price }}">
                                @error('buying_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
