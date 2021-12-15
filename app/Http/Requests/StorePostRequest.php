<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'اضف العنوان',
            'title.unique' => 'متكرر العنوان',
            'title.max'=>'اقص عدد حروف 255',
            'body.required' => 'A message is required',
        ];
    }}
