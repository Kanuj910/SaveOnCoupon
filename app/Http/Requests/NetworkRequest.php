<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NetworkRequest extends Request
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

     public function messages()
    {
        return [
            'name.required'    => 'A name is required.',
            'url.required'    => 'The url field is required',
            'tracking_id.required'  => 'trackingid is required'
        ];
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
            'url' => 'required|unique:networks|checkdnsrr',
            'tracking_id' => 'required|unique:networks'
        ];
    }

    
}
