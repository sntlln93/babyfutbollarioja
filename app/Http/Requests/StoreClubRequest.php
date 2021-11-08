<?php

namespace App\Http\Requests;

use App\Models\Club;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreClubRequest extends FormRequest
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
            'name' => ['required','unique:clubs,name'],
            'field_description' => ['required'],
            'logo' => ['required','mimes:png,svg'],
            'area_code' => ['required','integer','digits_between:3,4'],
            'number' => ['required','integer','digits_between:5,7'],
            'categories' => ['required','array'],
            'categories.*' => ['required','exists:categories,id'],
        ];
    }

    public function validatedClub()
    {
        $base_path = Str::afterLast(Str::lower(get_class(new Club)), '\\');
        $validatedClub = $this->validated();

        return [
            'name' => $validatedClub['name'],
            'field_description' => $validatedClub['field_description'],
            'logo' => $validatedClub['logo']->store($base_path, 'public'),
        ];
    }

    public function validatedPhone()
    {
        $validatedPhone = $this->validated();
        return [
            'area_code' => $validatedPhone['area_code'],
            'number' => $validatedPhone['number'],
        ];
    }

    public function validatedCategories()
    {
        return $this->validated()['categories'];
    }
}
