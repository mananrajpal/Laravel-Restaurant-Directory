<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
          'content' => 'required|max:255',
          'restaurant_id' => 'required|numeric|max:9999999999|min:0',
          'user_id' => 'required|numeric|max:9999999999|min:0'
        ];
    }

    public function messages()
    {
      return [
        //Content messages
        'content.required' => 'Please enter your post content.',
        'content.max' => 'Your post cannot be longer than 255 charecters.',

        //restaurant_id messages
        'restaurant_id.required' => 'Please enter your restaurant ID.',
        'restaurant_id.max' => 'Your restaurant ID must be less than 9999999999.',
        'restaurant_id.min' => 'Your restaurant ID must be more than 0.',

        //user_id messages
        'user_id.required' => 'Please enter your user ID.',
        'user_id.max' => 'Your user ID must be less than 9999999999.',
        'user_id.min' => 'Your user ID must be more than 0.'
      ];
    }
}
