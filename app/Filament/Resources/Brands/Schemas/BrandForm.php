<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live()
                            ->afterStateUpdated(function (Set $set, Get $get, ?string $state, string $operation) {
                                if ($operation === 'edit' && $get('slug')) {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Generated automatically based on title'),
                        RichEditor::make('description')
                            ->fileAttachmentsDirectory('images/'.date('Y').'/'.date('m').'/'.date('d')),
                    ]),
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make()->schema([
                        FileUpload::make('photo')
                            ->image()
                            ->directory('preview/'.date('Y').'/'.date('m').'/'.date('d')),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }
}
