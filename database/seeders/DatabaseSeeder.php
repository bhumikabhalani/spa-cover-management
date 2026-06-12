<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Models\SpaModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@spa-cover.test'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ],
        );

        $customers = Customer::factory(5)->create();
        $spaModels = SpaModel::factory(3)->create();

        foreach (range(1, 8) as $index) {
            Order::factory()->create([
                'customer_id' => $customers->random()->id,
                'spa_model_id' => $spaModels->random()->id,
                'status' => match ($index % 3) {
                    0 => OrderStatus::Draft,
                    1 => OrderStatus::Production,
                    default => OrderStatus::Shipped,
                },
            ]);
        }
    }
}
