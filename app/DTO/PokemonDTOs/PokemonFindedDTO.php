<?php
namespace App\DTO\PokemonDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class PokemonFindedDTO extends DataTransferObject
{
    public array $pokemonsfinded;
    public bool $pokemonExist;
}