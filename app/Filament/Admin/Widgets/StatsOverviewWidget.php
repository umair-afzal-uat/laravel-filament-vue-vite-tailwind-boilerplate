<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\ContactQuery;
use App\Models\Lead;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Users', User::count())
                ->description('All registered users')
                ->color('primary'),

            Card::make('Contact Queries', ContactQuery::count())
                ->description('Total contact queries received')
                ->color('success'),

            Card::make('Leads', Lead::count())
                ->description('Total leads received')
                ->color('info'),
        ];
    }
}
