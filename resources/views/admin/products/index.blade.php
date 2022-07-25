@extends('admin.layout.master')
@section('page')
View Product
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">

            <div class="card">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                       <strong>{{session()->get('message')}}</strong>
                </div>
                @endif
                <div class="header">
                    <h4 class="title">All Products</h4>
                    <p class="category">List of all stock</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)


                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->disc}}</td>
                            <td>
                                {{-- @dd($form); --}}
                            @if (empty($product->image))
                            <img src="{{asset('defaultblog.png')}}" width="100px" height="100px">

                            @else
                            <img src="{{asset('uploads/'.$product->image)}}" width="100px" height="100px" >
                        @endif
                            </td>
                            <td>

                                <a href="{{route('products.edit', $product->id) }}"><button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button></a>
                                <a href="{{route('products.delete', $product->id) }}"><button class="btn btn-sm btn-danger ti-trash" title="Delete"></button></a>
                                <a href="{{route('products.detail',$product->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button></a>
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
