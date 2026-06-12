<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpaModelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'width' => ['required', 'integer', 'min:1', 'max:10000'],
            'height' => ['required', 'integer', 'min:1', 'max:10000'],
            'corner_radius' => ['required', 'integer', 'min:0', 'max:5000'],
            'hinge_position' => ['nullable', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
        ];
    }
}
