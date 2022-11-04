<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "min:3"],
            "cover" => ["max:10000", "mimes:png,jpg,jpeg"],
            "seasonsQty" => ["integer", "min:1"],
            "episodesPerSeason" => ["integer", "min:1"]
        ];
    }

    // public function messages()
    // {
    //     return [
    //         "nome.required" => "O campo nome não pode estar vazio!!!",
    //         "nome.min" => "O campo nome precisa de pelo menos :min caracteres!!!"
    //     ];
    // }
}
