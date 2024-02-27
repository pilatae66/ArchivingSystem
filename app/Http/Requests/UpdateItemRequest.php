<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'item_code' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'unit_of_measure' => ['required','string','max:255'],
            'image_url' => ['file','mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}
