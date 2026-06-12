<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'spa_model_id',
        'quantity',
        'foam_thickness',
        'color',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'foam_thickness' => 'integer',
            'status' => OrderStatus::class,
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order): void {
            if (! $order->status) {
                $order->status = OrderStatus::Draft;
            }
        });
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function spaModel(): BelongsTo
    {
        return $this->belongsTo(SpaModel::class);
    }
}
