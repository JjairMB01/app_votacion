<?php

namespace App\Filament\Resources\PostulateResource\Pages;

use App\Filament\Resources\PostulateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostulate extends EditRecord
{
    protected static string $resource = PostulateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
