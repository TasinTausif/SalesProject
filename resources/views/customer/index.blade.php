@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Purchase History</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Purchase History</li>
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
                                <h3 class="card-title">All Catagories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Seller Name</th>
                                            <th>Product Name</th>
                                            <th>S size Purchased</th>
                                            <th>M size Purchased</th>
                                            <th>L size Purchased</th>
                                            <th>XL size Purchased</th>
                                            <th>Purchased at</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $key => $customer)
                                            <tr>
                                                <td>{{ $customer->user->name }}</td>
                                                <td>{{ $customer->supplier->user->name }}</td>
                                                <td>{{ $customer->supplier->product_name }}</td>
                                                <td>{{ $customer->s }}</td>
                                                <td>{{ $customer->m }}</td>
                                                <td>{{ $customer->l }}</td>
                                                <td>{{ $customer->xl }}</td>
                                                <td>{{ number_format($customer->supplier->selling_price, 3) }}</td>
                                                <td>{{ $customer->total_price }}</td>
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
