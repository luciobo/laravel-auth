@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="py-5 text-primary text-center">
            <h1 class="">Lista Fumetti</h1>
        </div>
        <div class="pb-5 text-primary text-center">
            <a href="{{ route('comics.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>Aggiungi</a>

        </div>
        <div class="container ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Immagine</th>
                        <th>Prezzo</th>
                        <th>Serie</th>
                        <th>Data Uscita</th>
                        <th>Tipo</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comics as $comicEl)
                        <tr>
                            {{--
                        $comics è un istanza del model comics.
                        pertanto possiamo usare la freccia -> per leggere i
                        valori delle varie colonne.
                        Nulla vieta di usare le quadre [] come se fosse un
                        array associativo
                        --}}
                            <td>{{ $comicEl['title'] }}</td>
                            {{-- Taglio il testo in modo che abbia massimo 50 caratteri.
                        Se ne ha di più vengono mostrati i ... --}}
                            <td>{{ Str::limit($comicEl->description, 50) }}</td>
                            <td><img class="w-50 py-2" src="{{ $comicEl->thumb }}" alt=""></td>
                            <td class="">€ {{ $comicEl->price }}</td>
                            <td>{{ $comicEl->series }}</td>
                            <td>{{ $comicEl->sale_date }}</td>
                            <td>{{ $comicEl->type }}</td>
                            <td>
                                {{-- La funzione route() crea l'url completo per arrivare su una pagina.
                                Occore quindi passare il name delle rotta che vogliano.
                                Siccome la rotta "show" si aspetta un parametro dinamico dell'uri, obbligatorio,
                                questo lo passiamo come secondo argomento della funzione route(nome_rotta, valore_parametro_dinamico) --}}
                                <a href="{{ route('comics.show', $comicEl->id) }}" class="btn btn-link">
                                    <i class="bi bi-eye-fill"></i></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('comics.edit', $comicEl->id) }}" class="btn btn-link">
                                    <i class="bi bi-pen-fill"></i></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('comics.destroy', $comicEl->id) }}" method="POST">
                                    @csrf()
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash3"></i></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
