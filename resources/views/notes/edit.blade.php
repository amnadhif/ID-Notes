@extends('layouts.app')
@section('title', 'Edit Postingan')
@section('content')
    <form method="post" action="{{ url("note/$note->id") }}">
        @method('patch')
        @csrf
        <div class="my-3">
            <label for="title" class="form-label"><h3>Title</h3></label>
            <input type="text" class="form-control" id="title" value="{{ $note->title }}" name="title" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label"><h3>Note</h3></label>
            <textarea class="form-control" placeholder="type your note here" type="text" id="note" name="note" style="height: 100px" required>{{ $note->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-success">Save()</button>

    </form>
@endsection