<?php

namespace App\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentIcon;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;
use Filament\Pages;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string $routePath = '/';

    protected ?string $heading = 'Beranda';

    protected static ?string $navigationLabel = 'Beranda';

    protected static ?int $navigationSort = -2;

    public function getColumns(): int | string | array
    {
        return 1;
    }
}