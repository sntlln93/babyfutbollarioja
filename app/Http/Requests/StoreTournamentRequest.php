<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTournamentRequest extends FormRequest
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
    public function rules()
    {
        return [
                'name' => 'required',
                'categories' => 'required',
                'categories.*' => 'required',
                'double_game' => 'required',
                'type' => 'required',
                'photo' => 'required_if:is_private,false|mimes:jpg,jpeg',
                'is_main' => 'nullable',
                'is_public' => 'nullable'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_main' => $this->has('is_main') ? true : false,
            'is_public' => $this->has('is_public') ? true : false,
            'double_game' => $this->has('double_game') ? true : false,
        ]);
    }
}
