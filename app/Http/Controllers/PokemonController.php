<?php

namespace App\Http\Controllers;

use App\DealingApi\FetchDataApiInterface;
use App\Http\Requests\SearchPokemonRequest;
use App\Services\Pokemon\IndexPokemonService;
use App\Services\Pokemon\DetailPokemonService;
use App\Services\Pokemon\SearchPokemonService;

class PokemonController extends Controller
{
    public function index(
        IndexPokemonService $pokemonService,
        FetchDataApiInterface $fetchDataApiInterface
    )
    {
        $pokemons = $pokemonService->get_pokemon_data($fetchDataApiInterface);
        return view('pokemon.index',compact('pokemons'));
    }

    public function detail(
        $pokemonName,
        DetailPokemonService $detailPokemonService,
        FetchDataApiInterface $fetchDataApiInterface
    )
    {
        $detailPokemon = $detailPokemonService->get_pokemon_detail($pokemonName,$fetchDataApiInterface);
        return view('pokemon.detail',compact('detailPokemon'));
    }

    public function search(
        SearchPokemonRequest $request,
        SearchPokemonService $searchPokemonService,
        FetchDataApiInterface $fetchDataApiInterface
        )
    {
        $pokemons = $searchPokemonService->search_pokemon($request->to_pokemon_searchDTO(),$fetchDataApiInterface);
        $pokemonExist=$pokemons->pokemonExist ? '' : 'no record data with name "'.$request->to_pokemon_searchDTO()->search.'"';
        $pokemons->results=$pokemons->pokemonsfinded;
        return view('pokemon.index',compact('pokemons','pokemonExist'));
    }
}