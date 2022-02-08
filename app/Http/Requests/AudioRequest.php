<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioRequest extends FormRequest
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
            'src'           => 'file|mimes:mp3,wav',
            'quality'       => 'required|numeric|in:64,128,192',
            'default_audio' => 'required|boolean|in:1,0',
        ];
    }
}
