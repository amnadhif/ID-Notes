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
                            <p class="card-text text-truncate" id="note-{{ $note->id }}">{{ $note->note }}</p>
                            <p class="fs-6 text-secondary">
                                @if ($note->created_at == $note->updated_at)
                                    Created at: {{ $note->created_at->format('Y-m-d H:i:s') }}
                                @else
                                    Edited at: {{ $note->updated_at->format('Y-m-d H:i:s') }}
                                @endif
                            </p>
                            <!-- Button to open modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#noteModal-{{ $note->id }}">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

<!-- Modal -->
@foreach ($notes as $note)
<div class="modal fade" id="noteModal-{{ $note->id }}" tabindex="-1" aria-labelledby="noteModalLabel-{{ $note->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel-{{ $note->id }}">{{ $note->title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $note->note }}</p>
            </div>
            <div class="modal-footer">
                <!-- Move Edit and Delete buttons to modal footer -->
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


@push('scripts')
<script>
    // Ambil semua card dengan kelas card
    var cards = document.querySelectorAll('.card');

    // Loop melalui setiap card
    cards.forEach(function(card) {
        // Tambahkan event click
        card.addEventListener('click', function() {
            // Ambil teks catatan lengkap
            var fullNote = card.querySelector('.card-text').textContent;

            // Tampilkan teks catatan lengkap dalam modal
            var modalId = card.querySelector('.modal').getAttribute('id');
            var modal = new bootstrap.Modal(document.getElementById(modalId), {
                keyboard: false
            });
            modal.show();
            
            // Atau gunakan jQuery
            // $('#' + modalId).modal('show');
        });
    });
</script>
@endpush
