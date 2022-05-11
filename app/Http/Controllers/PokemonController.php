<?php
namespace App\Http\Controllers;

use App\DealingApi\FetchDataApiInterface;
use App\Http\Requests\SearchPokemonRequest;

class PokemonController extends Controller
{
    public function index(FetchDataApiInterface $fetchDataApiInterface)
    {
        $pokemons = $fetchDataApiInterface->get_all();
        return view('pokemon.index',compact('pokemons'));
    }

    public function detail($pokemonName, FetchDataApiInterface $fetchDataApiInterface)
    {
        $detailPokemon = $fetchDataApiInterface->get_one($pokemonName);
        return view('pokemon.detail',compact('detailPokemon'));
    }

    public function search(SearchPokemonRequest $request,FetchDataApiInterface $fetchDataApiInterface)
    {
        $pokemons = $fetchDataApiInterface->search($request->to_pokemon_searchDTO());
        $pokemonExist=$pokemons->pokemonExist ? '' : 'no record data with name "'.$request->to_pokemon_searchDTO()->search.'"';
        $pokemons->results=$pokemons->pokemonsfinded;
        return view('pokemon.index',compact('pokemons','pokemonExist'));
    }
}