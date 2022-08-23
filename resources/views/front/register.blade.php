@extends('front.layout.master')
@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Sign Up</h2>
                    <hr>
                    @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <form action="{{route('register.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email">Name:</label>
                            <input type="text" name="name" placeholder="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>
.
                        <div class="form-group">
                            <label for="password">Confirm Password:</label>
                            <input type="password" name="password_confirmation" placeholder="Password" id="password" class="form-control">

                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" placeholder="Address" id="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection
