<?php
namespace App\DealingApi;

interface FetchDataApiInterface
{
    public function connect_to_api(string $pokemonName=""):object;
}