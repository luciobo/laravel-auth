@extends('layouts.app')

@section('content')
    <div class="text-center">

        <h1 class="py-5">Nuovo Comic</h1>

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                {{-- qui la rotta per ocllegare il form al comic controller  --}}
                <form action="{{ route('comics.store') }}" method="POST">
                    @csrf
                    {{-- title --}}
                    <div class="mb-3">
                        <label class="form-label">Titolo</label>
                        <input type="text"
                            class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                            name="title">

                        @error('title')
                            <div class="invalid-feedback">
                                hai toppato
                            </div>
                        @elseif(old('title'))
                            {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                            <div class="valid-feedback">
                                Bravo
                            </div>
                        @enderror
                    </div>
                    {{-- description --}}
                    <div class="mb-3">
                        <label class="form-label">Descrizione</label>
                        <textarea name="description" cols="30" rows="3"
                            class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror"></textarea>
                    </div>

                    @error('description')
                        <div class="invalid-feedback">
                            hai toppato
                        </div>
                    @elseif(old('description'))
                        {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                        <div class="valid-feedback">
                            Bravo
                        </div>
                    @enderror
                    {{-- immage --}}
                    <div class="mb-3">
                        <label class="form-label">Immagine</label>
                        <input type="text"
                            class="form-control @error('thumb') is-invalid @elseif(old('thumb')) is-valid @enderror"
                            name="thumb">

                        @error('thumb')
                            <div class="invalid-feedback">
                                hai toppato
                            </div>
                        @elseif(old('thumb'))
                            {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                            <div class="valid-feedback">
                                Bravo
                            </div>
                        @enderror
                    </div>
                    {{-- price --}}
                    <div class="mb-3">
                        <label class="form-label">Prezzo</label>
                        <input type="number" 
                        step=".01" 
                        class="form-control @error('price') is-invalid @elseif(old('price')) is-valid @enderror" 
                        name="price">

                        @error('price')
                            <div class="invalid-feedback">
                                hai toppato
                            </div>
                        @elseif(old('price'))
                            {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                            <div class="valid-feedback">
                                Bravo
                            </div>
                        @enderror
                    </div>
                    {{-- serires --}}
                    <div class="mb-3">
                        <label class="form-label">Serie</label>
                        <input type="text"
                            class="form-control @error('series') is-invalid @elseif(old('series')) is-valid @enderror"
                            name="series">

                        @error('series')
                            <div class="invalid-feedback">
                                hai toppato
                            </div>
                        @elseif(old('series'))
                            {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                            <div class="valid-feedback">
                                Bravo
                            </div>
                        @enderror
                    </div>
                    {{-- sale date --}}
                    <div class="mb-3">
                        <label class="form-label">Data prima vendita</label>
                        <input type="date" 
                        class="form-control @error('sale_date') is-invalid @elseif(old('sale_date')) is-valid @enderror" 
                        name="sale_date">

                        @error('sale_date')
                            <div class="invalid-feedback">
                                hai toppato
                            </div>
                        @elseif(old('sale_date'))
                            {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                            <div class="valid-feedback">
                                Bravo
                            </div>
                        @enderror
                    </div>
                    {{-- button add comics --}}
                    <div class="mb-3">
                        <label class="form-label">Tipologia</label>
                        <input type="text"
                            class="form-control @error('type') is-invalid @elseif(old('type')) is-valid @enderror"
                            name="type">

                        @error('type')
                            <div class="invalid-feedback">
                                hai toppato
                            </div>
                        @elseif(old('type'))
                            {{-- altrimenti se c'è un valore old per title, mostra un valid-feedback --}}
                            <div class="valid-feedback">
                                Bravo
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Aggiungi Comics</button>
                </form>
            </div>
        </div>
    </div>
@endsection
