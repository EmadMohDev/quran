<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AzkarRequest extends FormRequest
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
            'category_id'  => 'required|numeric|exists:categories,id',
            'zekr'         => 'required|string|min:3',
            'count'        => 'nullable|numeric',
            'reference'    => 'nullable|string|min:3',
            'description'  => 'nullable|string|min:3',
        ];
    }
}
