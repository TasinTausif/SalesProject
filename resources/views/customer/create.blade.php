@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product Table</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Seller Name</th>
                                            <th>Product Name</th>
                                            <th>Size</th>
                                            <th>Price<i class="text-sm">(per pcs)</i></th>
                                            <th>Available Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td scope="row">{{ $item->user->name }}</td>
                                                <td scope="row">{{ $item->product_name }}</td>
                                                <td scope="row">{{ $item->size }}</td>
                                                <td scope="row">{{ $item->selling_price }}</td>
                                                <td scope="row">{{ $item->remaining }}</td>
                                                <td scope="row">
                                                    <form method="POST" action="{{ route('customer.store', $item->id) }}">
                                                        <input type="number" min="1" max="{{ $item->remaining }}"
                                                            class="d-inline">
                                                        <button class="btn btn-sm btn-success">Buy</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
