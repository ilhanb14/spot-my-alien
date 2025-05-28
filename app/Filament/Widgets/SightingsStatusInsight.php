<?php

namespace App\Filament\Widgets;

use App\Models\Sighting;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SightingsStatusInsight extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Goedgekeurde meldingen', Sighting::where('status_id', 3)->whereMonth('created_at', now()->month)->count())
                ->description('goedgekeurde meldingen deze maand'),
            Stat::make('Afgekeurde meldingen', Sighting::where('status_id', 2)->whereMonth('created_at', now()->month)->count())
                ->description('meldingen die afgekeurd zijn deze maand'),
            Stat::make('Open meldingen', Sighting::where('status_id', 1)->count())
                ->description('meldingen die nog goedgekeurd moeten worden')
        ];
    }
}
