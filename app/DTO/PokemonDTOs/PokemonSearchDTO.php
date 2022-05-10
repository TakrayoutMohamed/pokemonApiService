<?php
namespace App\DTO\PokemonDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class PokemonSearchDTO extends DataTransferObject
{
    public string $search;
}