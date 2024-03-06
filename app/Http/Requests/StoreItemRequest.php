<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'img_url' => ['sometimes','file','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            //item code validation
            'item_code.required' => 'Item Code is required.',
            'item_code.string' => 'Item Code must be a string.',
            'item_code.max' => 'Item Code must be less than 255 characters.',
            //description validation
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a string.',
            'description.max' => 'Description must be less than 255 characters.',
            //unit of measure validation
            'unit_of_measure.required' => 'Unit of Measure is required.',
            'unit_of_measure.string' => 'Unit of Measure must be a string.',
            'unit_of_measure.max' => 'Unit of Measure must be less than 255 characters.',
            //image validation
            'img_url.required' => 'Image is required.',
            'img_url.mimes' => 'Image must be a file of type: jpeg, png, jpg, gif, svg.',
            'img_url.max' => 'Image must be less than 2048 KB.',
        ];
    }
}
