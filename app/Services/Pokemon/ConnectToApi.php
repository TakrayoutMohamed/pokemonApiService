<?php
namespace App\Services\Pokemon;

use GuzzleHttp\Client;

class ConnectToApi
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
}