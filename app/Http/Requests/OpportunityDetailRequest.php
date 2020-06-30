<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class OpportunityDetailRequest extends FormRequest
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
            'opportunityId' => 'required|numeric',
            'benefits' => 'required|string|max:255',
            'applicationProcess' => 'required|string|max:255',
            'furtherQueries' => 'required|string|max:255',
            'eligibilities' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'officialLink' => 'required|string',
            //'eligibleRegions' => 'required|string',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors'=>$validator->errors()],422));
    }
}
