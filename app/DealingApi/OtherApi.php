<?php
namespace App\DealingApi;

use GuzzleHttp\Client;
use App\DealingApi\FetchDataApiInterface;

class OtherApi implements FetchDataApiInterface
{
    protected $client;
    protected const url="https://pokeapi.co/api/v2/pokemon/";
    
    public function __construct()
    {
        $client = new Client();
        $this->client=$client;
    }
    public function connect_to_api(string $pokemonName=""):object
    {
        $data = $this->client->get(Self::url.$pokemonName);
        $detaildata=json_decode((string) $data->getBody());
        return $detaildata;
    }

    public function get_all()
    {

    }
    public function get_one(string $pokemonName)
    {

    }

    public function search(object $pokemonName)
    {

    }
}
