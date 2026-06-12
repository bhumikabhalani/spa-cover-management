<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpaModels\Pages\CreateSpaModel;
use App\Filament\Resources\SpaModels\Pages\EditSpaModel;
use App\Filament\Resources\SpaModels\Pages\ListSpaModels;
use App\Filament\Resources\SpaModels\Schemas\SpaModelForm;
use App\Filament\Resources\SpaModels\Tables\SpaModelsTable;
use App\Models\SpaModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SpaModelResource extends Resource
{
    protected static ?string $model = SpaModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquare3Stack3d;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Spa Models';

    protected static ?string $modelLabel = 'Spa Model';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return SpaModelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SpaModelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSpaModels::route('/'),
            'create' => CreateSpaModel::route('/create'),
            'edit' => EditSpaModel::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'hinge_position', 'description'];
    }
}
