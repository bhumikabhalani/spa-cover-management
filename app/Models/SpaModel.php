<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpaModel extends Model
{
    /** @use HasFactory<\Database\Factories\SpaModelFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'width',
        'height',
        'corner_radius',
        'hinge_position',
        'color',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'width' => 'integer',
            'height' => 'integer',
            'corner_radius' => 'integer',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
