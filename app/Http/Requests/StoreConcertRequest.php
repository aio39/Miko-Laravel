<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreConcertRequest extends FormRequest
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
        return [
            'category_id' => 'required',

            'cover_image' => 'required',
            'title' => 'required',
            'artist' => 'required',
            'detail' => 'required|min:3',
            'content' => 'required',

            'all_concert_start_date' => 'required',
            'all_concert_end_date' => 'required'
        ];
    }


}
