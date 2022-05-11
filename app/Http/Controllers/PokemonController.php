<?php
namespace App\Http\Controllers;

use App\Services\Pokemon\IPokemonService;
use App\Http\Requests\SearchPokemonRequest;

class PokemonController extends Controller
{
    public function index(IPokemonService $iPokemonService)
    {
        $pokemons = $iPokemonService->get_all();
        return view('pokemon.index',compact('pokemons'));
    }

    public function detail($pokemonName, IPokemonService $iPokemonService)
    {
        $detailPokemon = $iPokemonService->get_one($pokemonName);
        return view('pokemon.detail',compact('detailPokemon'));
    }

    public function search(SearchPokemonRequest $request,IPokemonService $iPokemonService)
    {
        $pokemons = $iPokemonService->search($request->to_pokemon_searchDTO());
        $pokemonExist=$pokemons->pokemonExist ? '' : 'no record data with name "'.$request->to_pokemon_searchDTO()->search.'"';
        $pokemons->results=$pokemons->pokemonsfinded;
        return view('pokemon.index',compact('pokemons','pokemonExist'));
    }
}