<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use stdClass;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultPaginationPageOption(10)
            ->paginated([3, 5, 10, 20, 'all'])
            ->extremePaginationLinks()
            ->columns([
                TextColumn::make('index')
                    ->label('#')
                    ->state(function (HasTable $livewire, stdClass $rowLoop): int {
                        $perPage = $livewire->getTableRecordsPerPage();

                        if ($perPage === 'all') {
                            return $rowLoop->iteration;
                        }

                        return $rowLoop->iteration
                            + ((int) $perPage * ($livewire->getTablePage() - 1));
                    }),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('parent.title')
                    ->sortable(),
                ImageColumn::make('photo')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
