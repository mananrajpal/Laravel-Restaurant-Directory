<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRestaurant extends FormRequest
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
    public $forceJsoResponse=true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|max:255',
          'phone' => 'nullable|numeric|min:0',
          'address1' => 'required|max:255',
          'address2' => 'nullable|max:255',
          'suburb' => 'required|max:255',
          'state' => 'required|max:3|min:2|alpha',
          'numberofseats' => 'nullable|numeric|min:0',
          'country_id' => 'required|numeric|max:9999999999|min:0',
          'category_id' => 'required|numeric|max:9999999999|min:0'
        ];
    }

    public function messages()
    {
      return [
        //Name messages
        'name.required' => 'Please enter your name.',
        'name.max' => 'Your name cannot be longer than 255 charecters.',

        //Phone messages
        'phone.numeric' => 'Your phone number can only contain digits.',
        'phone.min' => 'Your phone number cant be less than 0.',

        //Address1 messages
        'address1.required' => 'Please enter your address.',
        'address1.max' => 'Address line 1 cannot be longer than 255 charecters.',

        //Address2 messages
        'address2.max' => 'Address line 1 cannot be longer than 255 charecters.',

        //Suburb messages
        'suburb.required' => 'Please enter your suburb.',
        'suburb.max' => 'Suburb cannot be longer than 255 charecters.',

        //State messages
        'state.required' => 'Please enter your state.',
        'state.max' => 'State cannot be longer than 3 charecters.',
        'state.min' => 'State cannot be shorter than 2 charecters.',
        'state.alpha' => 'State can only contain letters.',

        //numberofseats messages
        'numberofseats.numeric' => 'Number of seats can only contain digits.',
        'numberofseats.min' => 'Number of seats cant be less than 0.',

        //Country messages
        'country_id.required' => 'Please enter your country ID.',
        'country_id.numeric' => 'Your country ID can only contain digits.',
        'country_id.max' => 'Your country ID must be less than 9999999999.',
        'country_id.min' => 'Your country ID cant be less than 0.',

        //Catagory messages
        'category_id.required' => 'Please enter your Catagory ID.',
        'category_id.numeric' => 'Your catagory ID must be less than 9999999999.',
        'category_id.max' => 'Your catagory ID must be less than 9999999999.',
        'category_id.min' => 'Your catagory ID cant be less than 0.'
      ];
    }

    protected function failedValidation(Validator $validator)
    {
    $response = [];
    $response['data'] = [];
    $response['status'] = 0;
    $response['message'] = trans('message.validation_errors');
    $response['errors'] = $validator->errors();
    throw new HttpResponseException(response()->json($response, 422));
  }
}
