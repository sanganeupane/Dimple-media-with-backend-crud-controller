@extends('frontend.master.master')
@section('login')

    <div class="container">
        <div class="row">
            <div class="col-md-6"><br>
                <h3>Login User</h3>
                @include('backend.layouts.message')

                <hr>
                <form action="{{route('login')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <a style="color:red;">{{$errors->first('username')}}</a>
                        <input type="text" name="username" class="form-control" placeholder="Username " value="{{old('username')}}"  id="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <a style="color:red;">{{$errors->first('password')}}</a>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"  id="password">
                    </div>
                    <br>
                    <div class ="form-group">
                        <button class="btn btn-danger">Login</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

@endsection
