<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMultiPostRequest extends FormRequest
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
            'edition_id' => 'required|integer|exists:editions,id',
            'surah_id' => 'required|integer|exists:surahs,id',
            'start' => 'required|integer|lt:end',
            'end' => 'required|integer|gt:start',
            'operator_id' => 'required|array',
            'operator_id.*' => 'integer|exists:operators,id',
            'published_date' => 'required|date',
            'active' => 'required|in:0,1',
        ];
    }
}
