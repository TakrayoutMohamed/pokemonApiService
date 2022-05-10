@extends('layout.app')

@section('content')
    <div class="p-4 m-2">
        <div class="row pt-2">
            @foreach ($pokemons->results as $pokemonId=>$pokemon)
                <div class="card-deck col-4 pb-4 text-center" >
                    <a href="{{ route('detail',$pokemon->name)}}" class="card col-12 box-shadow">
                        <div id="searchPokemonList">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">{{ $pokemon->name }}</h4>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('./storage/Pokemons/Images/'.$pokemon->name.'.png') }}" alt="here the picture of pokemon">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection