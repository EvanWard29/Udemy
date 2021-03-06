<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAlbumRequest extends FormRequest
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
            'cover_image' => 'required|image|max:1999'
        ];
    }
}
