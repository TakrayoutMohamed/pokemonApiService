<?php

namespace App\Http\Requests;

use App\DTO\PokemonDTOs\PokemonSearchDTO;
use Illuminate\Foundation\Http\FormRequest;

class SearchPokemonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'search' =>'string|required'
        ];
    }

    public function to_pokemon_searchDTO() :PokemonSearchDTO
    {
        return new PokemonSearchDTO(
            search : $this->search
        );
    }
}