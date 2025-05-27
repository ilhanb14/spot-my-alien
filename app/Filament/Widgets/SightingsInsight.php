<?php

namespace App\Filament\Widgets;

use App\Models\Sighting;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SightingsInsight extends BaseWidget
{
    protected function getStats(): array
    {
        $lastMonth = Carbon::now()->subMonth();
        $twoMonthsAgo = Carbon::now()->subMonths(2);
        $data = Sighting::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $trendData2 = Sighting::whereMonth('created_at', $lastMonth->month)->whereYear('created_at', $lastMonth->year)->count();
        $trendData1 = Sighting::whereMonth('created_at', $twoMonthsAgo->month)->whereYear('created_at', $twoMonthsAgo->year)->count();
        $ddosCounter = Sighting::where('created_at', '>=', Carbon::now()->subHour())->count();
        return [
            Stat::make('Meldingen', $data)
                ->descriptionIcon('heroicon-m-eye')
                ->description('Nieuwe meldingen deze maand')
                ->chart([$trendData1, $trendData2, $data])
                ->color($data > $trendData1 ? 'success' : 'failed'),

            Stat::make('Tijd sinds Laatste melding', Carbon::parse(Sighting::latest('created_at')->value('created_at'))->diffForHumans() ?? 'Geen meldingen'),
            Stat::make('DDoS teller', $ddosCounter)
                ->description('als dit rood is trek de server uit, de wereld vergaat')
                ->color($ddosCounter > 50 ? 'danger' : 'success')
        ];
    }
}
