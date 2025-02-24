<?php

namespace App\Filament\Admin\Resources\ContactQueryResource\Pages;

use App\Filament\Admin\Resources\ContactQueryResource;
use Filament\Resources\Pages\ListRecords;

class ListContactQueries extends ListRecords
{
    protected static string $resource = ContactQueryResource::class;

    protected function getHeaderActions(): array
    {
        return []; 
    }
}
