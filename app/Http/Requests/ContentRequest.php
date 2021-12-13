<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        return match($this->method()) {
            'POST' => array_merge($rules, [
                'title' => ['required', 'string', 'max:255'],
                'paragraph' => ['required', 'string', 'max:1000'],
                'img_url' => ['required', 'string', 'max:255']
            ]),
            'PUT' => array_merge($rules, [
                'title' => ['required_without_all:paragraph,img_url', 'string', 'max:255'],
                'paragraph' => ['required_without_all:title,img_url', 'string', 'max:1000'],
                'img_url' => ['required_without_all:title,paragraph', 'string', 'max:255']
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
