<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole()) {
            return;
        }
        
        // Force Livewire to use workshop-api prefix
        \Livewire\Livewire::setUpdateRoute(function ($handle) {
            return \Illuminate\Support\Facades\Route::post('/workshop-api/livewire/update', $handle)
                ->name('livewire.update');
        });
        
        \Livewire\Livewire::setScriptRoute(function ($handle) {
            return \Illuminate\Support\Facades\Route::get('/workshop-api/livewire/livewire.js', $handle)
                ->name('livewire.assets');
        });
    }
}
