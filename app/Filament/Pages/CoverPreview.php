<?php

namespace App\Filament\Pages;

use App\Services\SvgGeneratorService;
use BackedEnum;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CoverPreview extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEye;

    protected static ?string $navigationLabel = 'Cover Preview';

    protected static ?int $navigationSort = 4;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'width' => 800,
            'height' => 600,
            'corner_radius' => 40,
            'color' => '#1e40af',
        ]);
    }

    public function defaultForm(Schema $schema): Schema
    {
        return $schema->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Cover Dimensions')
                    ->description('Adjust the values below to preview the spa cover in real time.')
                    ->columns(2)
                    ->schema([
                        TextInput::make('width')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->suffix('in')
                            ->live(debounce: 300),
                        TextInput::make('height')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->suffix('in')
                            ->live(debounce: 300),
                        TextInput::make('corner_radius')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->suffix('in')
                            ->live(debounce: 300),
                        ColorPicker::make('color')
                            ->required()
                            ->live(debounce: 300),
                    ]),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Form::make([
                    EmbeddedSchema::make('form'),
                ]),
                Section::make('Live Preview')
                    ->schema([
                        View::make('filament.pages.partials.cover-preview-svg')
                            ->viewData(fn (): array => [
                                'svg' => $this->getSvgPreview(),
                            ]),
                    ]),
            ]);
    }

    protected function getSvgPreview(): string
    {
        $state = $this->form->getState();

        return app(SvgGeneratorService::class)->generate(
            (int) ($state['width'] ?? 800),
            (int) ($state['height'] ?? 600),
            (int) ($state['corner_radius'] ?? 0),
            (string) ($state['color'] ?? '#000000'),
        );
    }
}
