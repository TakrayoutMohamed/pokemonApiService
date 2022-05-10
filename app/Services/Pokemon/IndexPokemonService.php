<?php
namespace App\Services\Pokemon;

use Illuminate\Support\Facades\Storage;
use App\DTO\PokemonDTOs\PokemonIndexDTO;
use App\DealingApi\FetchDataApiInterface;

class IndexPokemonService
{
    
    public function get_pokemon_data(FetchDataApiInterface $fetchDataApiInterface):PokemonIndexDTO
    {
        $this->uploadPokemonImages($fetchDataApiInterface);
        return new PokemonIndexDTO(
            results:$fetchDataApiInterface->connect_to_api()->results,
        );
    }
    //store image of pokemons to the public path 
    public function uploadPokemonImages(FetchDataApiInterface $fetchDataApiInterface)
    {
        $pokemons = $fetchDataApiInterface->connect_to_api()->results;
        foreach($pokemons as $pokemonId => $pokemon)
        {
            if(!file_exists(storage_path().'/app/public/Pokemons/Images/'.$pokemon->name.'.png'))
            {
                $url = $fetchDataApiInterface->connect_to_api($pokemon->name)->sprites->front_shiny;
                $contents = file_get_contents($url);
                $name = $pokemon->name.substr($url,strrpos($url, "."));
                Storage::put('/public/Pokemons/Images/'.$name, $contents);
            }
        }
    }
}