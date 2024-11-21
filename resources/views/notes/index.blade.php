@extends('layouts.app')
@section('title', 'Notes')
@section('content')
    <main>
        <div id="main">
            <a href="{{ url('/note/create') }}" class="btn btn-outline-success my-4">+ Add a note</a>
            <div class="row">
                @foreach ($notes as $note)
                    <div class="col-12 col-sm-6 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $note->title }}</h5>
                                <!-- Tampilkan hanya dua baris pertama dari catatan -->
                                <p class="card-text">
                                    {!! nl2br(e(Str::limit($note->note, 100))) !!}
                                </p>
                                <p class="fs-6 text-secondary">
                                    @if ($note->created_at == $note->updated_at)
                                        Created at: {{ $note->created_at->format('Y-m-d H:i:s') }}
                                    @else
                                        Edited at: {{ $note->updated_at->format('Y-m-d H:i:s') }}
                                    @endif
                                </p>
                                <!-- Button to open modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#noteModal-{{ $note->id }}">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    @foreach ($notes as $note)
        <div class="modal fade" id="noteModal-{{ $note->id }}" tabindex="-1"
            aria-labelledby="noteModalLabel-{{ $note->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noteModalLabel-{{ $note->id }}">{{ $note->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! nl2br(e($note->note)) !!}
                    </div>
                    <div class="modal-footer">
                        @if (Auth::user()->email === 'admin@admin.com')
                            <p class="text-secondary">
                                <small>Owned by: {{ $note->user->name }}, {{ $note->user->email }}</small>
                            </p>
                        @endif
                        <form action="{{ url("note/$note->id") }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ url("/note/$note->id/edit") }}" class="btn btn-success">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
