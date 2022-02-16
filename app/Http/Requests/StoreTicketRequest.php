<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'concert_id' => 'required',

            'price' => 'required',
            'running_time' => 'required',

            'sale_start_date' => 'required',
            'sale_end_date' => 'required',
            'concert_start_date' => 'required',
            'concert_end_date' => 'required',
            'archive_end_time' => 'required',

        ];
    }
}
