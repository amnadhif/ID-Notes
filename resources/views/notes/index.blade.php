@extends('layouts.app')
@section('title', 'Notes')
@section('content')
    <main>
        <div id="main">
            <a href="{{ url('/note/create') }}" class="btn btn-outline-success my-4">+ Add a note</a>
            <div class="row">
                @foreach ($note as $notes)
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $notes->title }}</h5>
                                <p class="card-text">{{ $notes->note }}</p>
                                <form action="{{ url("note/$notes->id") }}" method="post">
                                @csrf
                                @method("delete")
                                <a href="{{ url("/note/$notes->id/edit") }}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-success">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
