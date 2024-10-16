<?php

namespace App\Filament\Resources\ApprenticeResource\Pages;

use App\Filament\Resources\ApprenticeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApprentices extends ListRecords
{
    protected static string $resource = ApprenticeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
