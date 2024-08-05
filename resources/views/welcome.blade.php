    @extends('layouts.app')
    @section('title', 'Welcome')
    @section('content')
        <div class="position-relative mx-auto my-5 p-5 text-justify text-muted bg-body border border-dashed rounded-5">
            <img src="{{ asset("assets/img/logo.svg")}}" alt="ID-Notes" class="mt-5">
            <h4 class="col-lg-6 mb-4">
                take notes without hassle, save your notes on the web, and don't forget it's all free for you!
            </h4>
            <a href="{{ url('/register') }}" class="btn btn-success px-3 mb-5" type="button">
                Register Now
            </a>
        </div>
    @endsection
