<?php

namespace App\Filament\Resources\YearVotingResource\Pages;

use App\Filament\Resources\YearVotingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditYearVoting extends EditRecord
{
    protected static string $resource = YearVotingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
