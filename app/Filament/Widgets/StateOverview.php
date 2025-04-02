<?php

namespace App\Filament\Widgets;

use App\Models\Recipe;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StateOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', $this->getTotalUsers())
                ->description('Total users joined the system')
                ->descriptionIcon('heroicon-m-user')
                ->color('success'),
            Stat::make('Total Recipes', $this->getTotalRecipes())
                ->description('Total recipes created here')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('info'),
            Stat::make('Popular Category', $this->getPopularCategory())
                ->description('The most popular categories created by user')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),
        ];
    }

    public function getTotalUsers(): int
    {
        return User::where('role', 'user')->count() ?? 0;
    }

    public function getTotalRecipes(): int
    {
        return Recipe::count() ?? 0;
    }

    public function getPopularCategory(): string
    {
        return Recipe::select('category', DB::raw('COUNT(*) as total_recipes'))
                ->groupBy('category')
                ->orderBy('total_recipes', 'desc') // Change to 'asc' for ascending order
                ->first()
                ->category;
    }
}
