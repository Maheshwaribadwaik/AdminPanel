@extends('admin.layout.master')
@section('page')
Order Product
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                @if (session()->has('message'))
                   <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                          {{session()->get('message')}}
                   </div>
                   @endif
                <div class="header">
                    <h4 class="title">Orders</h4>
                    <p class="category">List of all orders</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>

                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($order as $order)
                            <td>{{$order->id}}</td>
                            <td>{{@$order->user->name}}</td>
                            <td>
                                @foreach($order->products as $item)
                                        {{$item->name}}
                          @endforeach
                            </td>

                            <td>
                                @foreach($order->OrderItems as $item)
                                {{$item->quantity}}
                                @endforeach
                            </td>


                            <td>
                                @if ($order->Status)
                                <span class="label label-success">Confirmed</span>
                                @else
                                <span class="label label-warning">Pending</span>
                               @endif

                            </td>
                            <td>
                             @if($order->status)
                                <a href="{{route('orders.pending',$order->id)}}">
                                    <button class="btn btn-danger" type="button"
                                        >Pending</button></a>
                             @else

                                <a href="{{route('orders.confirm',$order->id)}}">
                                    <button class="btn btn-success" type="button">confirm</button></a>
                             @endif



                                <a href="{{route('orders.details',$order->id)}}">
                                    <button class="btn btn-success" type="button">Details</button></a>
                            </td>
                        </tr>
                        @endforeach



                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
</div>
@endsection
