<?php

namespace App\Http\Requests;

use \App\Contact;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            $rules = Contact::VALIDATION_STORE_RULES;
        } else {
            $rules = Contact::VALIDATION_UPDATE_RULES;
        }

        return $rules;

    }
}
