<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AyahRequest extends FormRequest
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
            'number'         => 'required|numeric|between:1,6236',
            'text'           => 'required|string|min:1',
            'order_in_surah' => 'required|numeric|between:1,286',
            'juz'            => 'required|numeric|between:1,30',
            'page'           => 'required|numeric|between:1,640',
            'hizb_quarter'   => 'required|numeric|between:1,240',
            'ruku'           => 'required|numeric|between:1,600',
            'manzil'         => 'required|numeric|between:1,300',
            'is_sajda'       => 'required|boolean|in:1,0',
            'surah_id'       => 'required|numeric|exists:surahs,id',
            'edition_id'     => 'required|numeric|exists:editions,id',
            'image'          => 'nullable|image|mimes:png,jpg',
            'audios'         => 'required|array|min:1',
            'audios.*'       => 'required|array',
            'audios.*.quality' => 'required|numeric|in:32,40,48,64,128,192',
            'audios.*.default_audio' => 'nullable|in:1,',
            'audios.*.src'   => 'required_without:audios.*.id|file|mimes:mp3,wav',
            'audios.*.id'    => 'nullable|numeric|exists:audios,id',
        ];
    }
}
