<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SendMessageRequest
 *
 * @package App\Http\Requests
 */
class SendMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'message' => 'required|string|max:255',
        ];
    }

    /**
     * Set messages to return
     * 
     * @return array
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category is required.',
            'category_id.integer' => 'The category must be an integer.',
            'message.required' => 'The message is required.',
            'message.string' => 'The message must be a string.',
            'message.max' => 'The message may not be greater than 255 characters.',
        ];
    }
}
