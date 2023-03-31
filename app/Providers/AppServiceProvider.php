<?php

namespace App\Providers;

use App\Filament\Resources\CourseResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Courses')
                    ->url(CourseResource::getUrl())
                    ->icon('heroicon-o-academic-cap')
                    ->activeIcon('heroicon-s-academic-cap')
                    ->isActiveWhen(fn (): bool => request()->routeIs('filament.resources.courses.*') || request()->routeIs('filament.resources.courses/lessons.*')),
            ]);
        });
    }
}
