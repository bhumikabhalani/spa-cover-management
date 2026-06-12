<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        return self::rulesFor($this->resolveCustomerId());
    }

    /**
     * @return array<string, mixed>
     */
    public static function rulesFor(?int $customerId = null): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('customers', 'email')->ignore($customerId)],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:20'],
        ];
    }

    protected function resolveCustomerId(): ?int
    {
        $record = $this->route('record');

        if (is_object($record) && method_exists($record, 'getKey')) {
            return (int) $record->getKey();
        }

        return $this->route('customer') ? (int) $this->route('customer') : null;
    }
}
