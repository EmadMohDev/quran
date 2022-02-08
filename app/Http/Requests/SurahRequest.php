<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurahRequest extends FormRequest
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
            'number'    => 'required|between:1,114|unique:surahs,number,' . $this->id,
            'name'      => 'required|min:3|max:200|string|unique:surahs,name,' . $this->id . '|unique:surahs,name_en,' . $this->id,
            'name_en'   => 'required|min:3|max:200|string|unique:surahs,name,' . $this->id . '|unique:surahs,name_en,' . $this->id,
            'translation_name_en'   => 'required|min:3|max:200|string|unique:surahs,translation_name_en,' . $this->id,
            'surah_type' => 'required|in:1,0|boolean',
            'count_of_ayahs' => 'required|between:1,300',
        ];
    }
}
