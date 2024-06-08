@extends('layouts.main') 
@section('content') 
    <div class="container"> 
        <div class="row"> 
            <div class="col-6 mx-auto"> 
            <div> 
            </div> 
        <div class="card"> 
            <div class="card-header text-center"> 
                Halaman Login 
            </div> 
            <div class="card-body "> 
                <div class="text-center"> 
                    <img src="{{asset('img/uniska.png')}}" alt="" width="50%"> 
                </div> 
                <form action="{{Route('login')}}" method="post"> 
                    @csrf
            <div class="form-group mt-2 "> 
                <label for="">Username</label> 
                <input type="text" class="form-control" placeholder="enter your username" name="username" value="{{old('password')}}"> 
            </div> 
            <div class="form-group mt-2"> 
                <label for="">Password</label> 
                <input type="password" class="form-control" placeholder="enter your password" name="password" value="{{old('password')}}"> 
            </div> 
            <div class="my-2 text-center" > 
                <button type ="submit" class="btn btn-primary">Login User</button> 
            </div> 
            </form> 
        </div> 
        </div> 
        </div> 
    </div> 
@endsection