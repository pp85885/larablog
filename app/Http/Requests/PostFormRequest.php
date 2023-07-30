<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules  = [
            'category_id' => ['required','integer'],
            'name' => ['required','string'],
            'slug' => ['required','string'],
            'description' => ['required'],
            'meta_title' => ['required','string'],
            'meta_description' => ['nullable','string'],
            'meta_keyword' => ['nullable','string'],
            'status' => ['nullable'],
            'yt_iframe' => ['nullable','string'],
        ];
        return $rules;
    }
}
