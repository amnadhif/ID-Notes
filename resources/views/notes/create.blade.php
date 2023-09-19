@extends('layouts.app')
@section('title', 'Create Note')
@section('content')
    <div class="container">
    <form action="{{ url('/note') }}" method="post">
        @csrf
        <div class="my-3">
            <label for="title" class="form-label"><h3>Title</h3></label>
            <input class="form-control" placeholder="type your note's title" type="text" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label"><h3>Note</h3></label>
            <textarea class="form-control" placeholder="type your note here" type="text" id="note" name="note" style="height: 100px" required></textarea>
        </div>
        <button type="submit" class="btn btn-outline-success">+ Create a note</button>
    </form>
</div>
@endsection