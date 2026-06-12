<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'customer_id' => ['required', 'exists:customers,id'],
            'spa_model_id' => ['required', 'exists:spa_models,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'foam_thickness' => ['nullable', 'integer', 'min:1', 'max:500'],
            'color' => ['required', 'string', 'max:50'],
            'status' => ['nullable', Rule::enum(OrderStatus::class)],
        ];
    }
}
