<?php
namespace App\DTO\PokemonDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class PokemonIndexDTO extends DataTransferObject
{
    public array $results;
}