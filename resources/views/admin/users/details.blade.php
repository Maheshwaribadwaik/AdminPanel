@extends('admin.layout.master')
@section('page')
Add products
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{@$orders->user->name}} Orders details</h4>
                        <p class="category">List of all registered users</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>Address</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{@$orders->id}}</td>
                                <td>{{$orders->products[0]->name}}</td>
                                <td>{{$orders->address}}</td>
                                <td>{{$orders->orderItems[0]->quantity}}</td>
                                <td>{{$orders->orderItems[0]->price}}</td>
                                <td>{{$orders->date}}</td>
                                <td>
                                    @if ($orders->status)
                                      <span class="label label-success">confirm</span>
                                      @else
                                      <span class="label label-warning">pending</span>
                                      @endif
                                </td>
                            </tr>



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
