@extends('front.layout.master')
@section('content')
<br>
<div class="col-md-12">
    <h4 class="title">User Details</h4>
    <div class="card">
        <div class="header">

            <p class="category">User Details</p>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped">
                <tbody>

                    <tr>
                        <th>ID</th>
                        <td>{{Auth::user()->id}}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{Auth::user()->email}}</td>
                    </tr>

                    <tr>
                        <th>Registered At</th>
                        <td>{{Auth::user()->created_at}}</td>
                    </tr>


                </tbody>

            </table>

        </div>
    </div>
</div>
</div>
<br>
<br>
<h4 class="title">Orders</h4>
<div class="content table-responsive table-full-width">
    <table class="table table-striped">
        <thead>
        <tr>

            <th>ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($user->order as $order)
            <td>{{$order->id}}</td>

            <td>
                @foreach($order->products as $item)
                       <table class="table">
                        <tr>
                            <td>{{$item->name}}</td>
                        </tr>
                        </table>
                @endforeach
            </  td>

            <td>
                @foreach($order->OrderItems as $item)
                <table class="table">
                    <tr>
               <td> {{$item->quantity}}</td>
                    </tr>
                </table>
                @endforeach
            </td>

            <td>
                @foreach($order->OrderItems as $item)
                <table class="table">
                    <tr>
               <td>RS{{$item->price}}</td>
                    </tr>
                </table>
                @endforeach
            </td>


            <td>
                @if ($order->Status)
                <span class="badge badge-success">Confirmed</span>
                @else
                <span class="badge badge-warning">Pending</span>
               @endif

            </td>
            <td>
               <a href="{{ route('front.profile.details') . '/' . $order->id}}" class="btn btn-outline-dark btn-sm">Details</a>
            </td>


            @endforeach
         </tr>




        </tbody>
    </table>

</div>
@endsection
