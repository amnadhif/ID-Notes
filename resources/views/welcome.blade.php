@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
    <div class="position-relative mx-auto my-5 p-5 text-justify text-muted bg-body border border-dashed rounded-5">
        <svg class="bi mt-5 mb-3" width="48" height="48">
            <use xlink:href="#check2-circle"></use>
        </svg>
        <h1 class="text-body-emphasis">ID-Notes</h1>
        <h4 class="col-lg-6 mb-4">
            take notes without hassle, save your notes on the web, and don't forget it's all free for you!
        </h4>
        <a href="{{ url('/register') }}" class="btn btn-success px-3 mb-5" type="button">
            Register Now
        </a>
    </div>
@endsection
