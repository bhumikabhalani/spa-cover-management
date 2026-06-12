<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Models\SpaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'spa_model_id' => SpaModel::factory(),
            'quantity' => fake()->numberBetween(1, 5),
            'foam_thickness' => fake()->randomElement([2, 3, 4, 5]),
            'color' => fake()->hexColor(),
            'status' => fake()->randomElement(OrderStatus::cases()),
        ];
    }
}
