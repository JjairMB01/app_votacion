<?php

namespace App\Filament\Resources\YearVotingResource\Pages;

use App\Filament\Resources\YearVotingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListYearVotings extends ListRecords
{
    protected static string $resource = YearVotingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
