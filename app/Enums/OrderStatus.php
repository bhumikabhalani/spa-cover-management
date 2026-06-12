<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasLabel
{
    case Draft = 'draft';
    case Production = 'production';
    case Shipped = 'shipped';

    public function getLabel(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Production => 'Production',
            self::Shipped => 'Shipped',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Production => 'warning',
            self::Shipped => 'success',
        };
    }
}
