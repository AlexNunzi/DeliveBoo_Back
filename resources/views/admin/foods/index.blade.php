@extends('layouts.app')

@section('content')
    <div class="row">
        @forelse ($foods as $food)
            <div class="col-12 col-md-6 col-lg-4 py-2">
                <div class="card h-100">
                    @if ($food->image)
                        <img class="card-img-top my-card-img" src="{{ asset('storage/' . $food->image) }}"
                            alt="{{ $food->name }}" />
                    @else
                        <img src="https://placehold.co/600x400" alt="Nessuna Immagine">
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title me-2">{{ $food->name }}</h5>
                            <small>{{ $food->price }}€</small>
                        </div>
                        <p class="card-text">
                            {{ $food->description }}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        {{-- <a class="btn rounded-pill btn-primary me-2"
                            href="{{ route('admin.foods.show', $food->slug) }}">VEDI</a> --}}
                        <a href="{{ route('admin.foods.edit', $food->slug) }}" class="btn fancy-button bg-warning me-3"><i
                                class="fa-solid fa-pen"></i> MODIFICA</a>
                        <form class="form_delete_food" action="{{ route('admin.foods.destroy', ['food' => $food->slug]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn fancy-button bg-danger"> <i class="fa-solid fa-trash-can"></i>
                                ELIMINA </button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <p>Non ci sono cibi</p>
            <a class="btn btn-warning" href="{{ route('admin.dashboard') }}">Vai alla dashboard</a>
        @endforelse
    </div>
    <div class="text-center">
        <a class="btn fancy-button bg-primary my-4 me-3" href="{{ route('admin.dashboard') }}"> <i
                class="fa-solid fa-house"></i> Torna alla dashboard</a>
        <a class="btn fancy-button bg-success"href="{{ route('admin.foods.create') }}">
            <i class="fa-solid fa-plus"></i> Aggiungi Piatto</a>
    </div>



    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confermi di voler eliminare il piatto selezionato?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-danger">Conferma eliminazione</button>
                </div>
            </div>
        </div>
    </div>
@endsection
