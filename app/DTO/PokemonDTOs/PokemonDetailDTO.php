<?php
namespace App\DTO\PokemonDTOs;

use Spatie\DataTransferObject\DataTransferObject;

class PokemonDetailDTO extends DataTransferObject
{
    public string $height;
    public string $weight;
    public string $base_experience;
    public array $abilities;
    public array $stats;
    public array $moves;
}