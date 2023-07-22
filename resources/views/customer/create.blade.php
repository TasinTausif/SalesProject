@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">Category Name:</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                    id="category" aria-describedby="categoryHelp" name="category_name"
                                    value="{{ old('category_name') }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
