@extends('layouts.app')
@section('title', "Login")
@section('content')
<div class="row">
    <div class="col-md-4 mx-auto mt-5 mb-5">
        <div class="card">
            <h3 class="text-center mt-4">Login</h3>
            <div class="card-body">
                <form method="post" action="{{ url('login')}}">
                    @csrf
                    @if(session()->has('error_message'))
                    <div class="alert alert-danger">{{ session()->get('error_message')}}</div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <small class="text-danger">E-mail atau Password salah</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if($errors->has('password'))
                        <small class="text-danger">{{ $errors->first('password')}}</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection