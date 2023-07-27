@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Quantity') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('supplier.create') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="s" class="form-label">Smaall:</label>
                                <input type="number" class="form-control" id="s" aria-describedby="sHelp"
                                    name="s" value="{{ old('s') }}">
                            </div>
                            <div class="mb-3">
                                <label for="m" class="form-label">Medium:</label>
                                <input type="number" class="form-control" id="m" aria-describedby="mHelp"
                                    name="m" value="{{ old('m') }}">
                            </div>
                            <div class="mb-3">
                                <label for="l" class="form-label">Large:</label>
                                <input type="number" class="form-control" id="l" aria-describedby="lHelp"
                                    name="l" value="{{ old('l') }}">
                            </div>
                            <div class="mb-3">
                                <label for="xl" class="form-label">Extra Large:</label>
                                <input type="number" class="form-control" id="xl" aria-describedby="xlHelp"
                                    name="xl" value="{{ old('xl') }}">
                            </div>

                            <button type="submit" class="btn btn-info">Submit Quantities</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
