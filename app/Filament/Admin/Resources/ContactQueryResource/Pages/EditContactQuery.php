<?php

namespace App\Filament\Admin\Resources\ContactQueryResource\Pages;

use App\Filament\Admin\Resources\ContactQueryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactQuery extends EditRecord
{
    protected static string $resource = ContactQueryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
