<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
            'full_name'=>'required|string',
            'dob'=>'date_format:Y-m-d',
            'place_name'=>'required|string',
            'running_as'=>'required|string',
            'political_party'=>'required|string',
            'about'=>'required|string',
            'agendas'=>'required|string',
            'promises'=>'required|string',
            'country_id' => 'required|integer'
        ];
    }
}
