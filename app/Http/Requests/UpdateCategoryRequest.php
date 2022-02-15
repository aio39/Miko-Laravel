<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_id' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'title' => 'required',
            'poster' => 'required',
            'desc' => 'required|min:3',
            'artist' => 'required',
            'price' => 'required',
            'openDate' => 'required',
            'closeDate' => 'required',
            'playTime' => 'required',
            'reEndDate' => 'required',
        ];
    }
}
