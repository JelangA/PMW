<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $workshops = \App\Models\Workshop::all();
        $stats = [];
        $stats[] = Stat::make('Total Pengguna', \App\Models\User::where('nim', '!=', 'null')->count())
            ->description('Total pengguna yang terdaftar di sistem.')
            ->descriptionIcon('heroicon-m-user-group');
        foreach ($workshops as $workshop) {
            $stats[] = Stat::make("Total Peserta Workshop: {$workshop->title}", \App\Models\Attendance::where('workshop_id', $workshop->workshop_id)->count())
                ->description("Total peserta yang mengikuti workshop {$workshop->title}.")
                ->descriptionIcon('heroicon-m-user-group');
        }

        return $stats;
    }
}
