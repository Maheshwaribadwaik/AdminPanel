@extends('admin.layout.master')
@section('page')
Add products
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">Add Product</h4>
                </div>
                <div class="content">
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Name:</label>
                                    <input type="text" class="form-control border-input" placeholder="product name" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Product Price:</label>
                                    <input type="text" class="form-control border-input" placeholder="price" name="price">
                                </div>

                                <div class="form-group">
                                    <label>Product Description:</label>
                                    <textarea  id="discription" cols="30" rows="10"
                                              class="form-control border-input" placeholder="Product Description" name="disc"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Product Image:</label>
                                    <input type="file" id="image" class="form-control border-input" name="image">
                                    <div id="thumb-output"></div>
                                </div>

                            </div>

                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
