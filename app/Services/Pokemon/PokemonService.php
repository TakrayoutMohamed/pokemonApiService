<?php
namespace App\Services\Pokemon;

use GuzzleHttp\Client;
use Illuminate\Support\Str;
use App\Services\Pokemon\IPokemonService;
use Illuminate\Support\Facades\Storage;
use App\DTO\PokemonDTOs\PokemonIndexDTO;
use App\DTO\PokemonDTOs\PokemonDetailDTO;
use App\DTO\PokemonDTOs\PokemonFindedDTO;
use App\DTO\PokemonDTOs\PokemonSearchDTO;

class PokemonService implements IPokemonService 
{
    protected $client;
    protected const url="https://pokeapi.co/api/v2/pokemon/";
    
    public function __construct()
    {
        $client = new Client();
        $this->client=$client;
    }
    //connect to the api te get data than returns thier object
    public function connect_to_api(string $pokemonName=""):object
    {
        $data = $this->client->get(Self::url.$pokemonName);
        $detaildata=json_decode((string) $data->getBody());
        return $detaildata;
    }
    //get all pokemons name
    public function get_all():PokemonIndexDTO
    {
        $this->uploadPokemonImages();
        return new PokemonIndexDTO(
            results:$this->connect_to_api()->results,
        );
    }
    //get the detail of one specific Pokemon
    public function get_one(string $pokemonName):PokemonDetailDTO
    {
        return new PokemonDetailDTO(
            height :$this->connect_to_api($pokemonName)->height,
            weight :$this->connect_to_api($pokemonName)->weight,
            abilities :$this->connect_to_api($pokemonName)->abilities,
            base_experience :$this->connect_to_api($pokemonName)->base_experience,
            stats  :$this->connect_to_api($pokemonName)->stats,
            moves  : $this->connect_to_api($pokemonName)->moves,
        );
    }

    // search for a Pokemon entered
    public function search(PokemonSearchDTO $pokemonSearchDTO):PokemonFindedDTO
    {
        $pokemonData = $this->connect_to_api();
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
    //store image of pokemons to the public path than use it in the get_all() method above
    public function uploadPokemonImages():void
    {
        $pokemons = $this->connect_to_api()->results;
        foreach($pokemons as $pokemonId => $pokemon)
        {
            if(!file_exists(storage_path().'/app/public/Pokemons/Images/'.$pokemon->name.'.png'))
            {
                $url = $this->connect_to_api($pokemon->name)->sprites->front_shiny;
                $contents = file_get_contents($url);
                $name = $pokemon->name.substr($url,strrpos($url, "."));
                Storage::put('/public/Pokemons/Images/'.$name, $contents);
            }
        }
    }
}
