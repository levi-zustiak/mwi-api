<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        $rules = [];
        return match($this->method()) {
            'POST' => array_merge($rules, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'title' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string', 'max:1000']
            ]),
            'PUT' => array_merge($rules, [
                'first_name' => ['required_without_all:last_name,title,email,message', 'string', 'max:255'],
                'last_name' => ['required_without_all:first_name,title,email,message', 'string', 'max:255'],
                'title' => ['required_without_all:first_name,last_name,email,message', 'string', 'max:255'],
                'email' => ['required_without_all:first_name,last_name,title,message', 'string', 'max:255'],
                'message' => ['required_without_all:first_name,last_name,title,email', 'string', 'max:1000']
            ]),
            default => $rules
        };
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'data' => $this->validationData(),
                'errors' => $errors
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
