<?php
namespace App\Services\Pokemon;

use Illuminate\Support\Facades\Storage;
use App\DTO\PokemonDTOs\PokemonIndexDTO;
use App\DealingApi\FetchDataApiInterface;
use App\DTO\PokemonDTOs\PokemonDetailDTO;

class DetailPokemonService
{
    
    public function get_pokemon_detail(string $pokemonName,FetchDataApiInterface $fetchDataApiInterface):PokemonDetailDTO
    {
        return new PokemonDetailDTO(
            height :$fetchDataApiInterface->connect_to_api($pokemonName)->height,
            weight :$fetchDataApiInterface->connect_to_api($pokemonName)->weight,
            abilities :$fetchDataApiInterface->connect_to_api($pokemonName)->abilities,
            base_experience :$fetchDataApiInterface->connect_to_api($pokemonName)->base_experience,
            stats  :$fetchDataApiInterface->connect_to_api($pokemonName)->stats,
            moves  : $fetchDataApiInterface->connect_to_api($pokemonName)->moves,
        );
    }
}