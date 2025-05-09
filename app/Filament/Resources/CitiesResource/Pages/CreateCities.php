<?php

namespace App\Filament\Resources\CitiesResource\Pages;

use App\Filament\Resources\CitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCities extends CreateRecord
{
    protected static string $resource = CitiesResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Cities has been created';
    }
}
