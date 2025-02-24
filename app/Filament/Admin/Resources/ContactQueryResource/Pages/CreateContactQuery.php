<?php

namespace App\Filament\Admin\Resources\ContactQueryResource\Pages;

use App\Filament\Admin\Resources\ContactQueryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactQuery extends CreateRecord
{
    protected static string $resource = ContactQueryResource::class;
}
