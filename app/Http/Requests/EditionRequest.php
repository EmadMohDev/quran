<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditionRequest extends FormRequest
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
            'identifier'        => 'required|string|min:5|unique:editions,identifier,' . $this->id,
            'name'              => 'required|string|min:5',
            'name_en'           => 'required|string|min:5',
            'direction'         => 'required|string|in:ltr,rtl',
            'edition_lang_id'   => 'required|numeric|exists:edition_langs,id',
            'format_id'         => 'required|numeric|exists:formats,id',
            'provider_id'       => 'required|numeric|exists:providers,id',
            'edition_type_id'   => 'required|numeric|exists:edition_types,id',
        ];
    }
}
