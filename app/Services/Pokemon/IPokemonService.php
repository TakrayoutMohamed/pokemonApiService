<?php
namespace App\Services\Pokemon;

use App\DTO\PokemonDTOs\PokemonSearchDTO;

interface IPokemonService
{
    // public function connect_to_api(string $pokemonName=""):object;
    public function get_all();
    public function get_one(string $pokemonName);
    public function search(PokemonSearchDTO $pokemonSearchDTO);
}

