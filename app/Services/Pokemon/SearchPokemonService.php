<?php
namespace App\Services\Pokemon;

use Illuminate\Support\Str;
use App\DealingApi\FetchDataApiInterface;
use App\DTO\PokemonDTOs\PokemonFindedDTO;
use App\DTO\PokemonDTOs\PokemonSearchDTO;

class SearchPokemonService
{
    public function search_pokemon(PokemonSearchDTO $pokemonSearchDTO,FetchDataApiInterface $fetchDataApiInterface):PokemonFindedDTO
    {
        $pokemonData = $fetchDataApiInterface->connect_to_api();
        $pokemonsfinded=[];
        $pokemonExist=false;
        foreach ($pokemonData->results as $key => $pokemon) {
            if(Str::contains(Str::upper($pokemon->name),Str::upper($pokemonSearchDTO->search)))
            {
                $pokemonsfinded[$key]=$pokemon;
            }
        }
        $pokemonsfinded ? $pokemonExist=true :($pokemonsfinded=$pokemonData->results); 
        return new PokemonFindedDTO(
            pokemonsfinded: $pokemonsfinded,
            pokemonExist:$pokemonExist
        );
    }
}