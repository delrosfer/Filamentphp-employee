<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $mx = Country::where('country_code', 'mx')->withCount('employees')->first();
        $us = Country::where('country_code', 'us')->withCount('employees')->first();
        $ar = Country::where('country_code', 'ar')->withCount('employees')->first();

        return [
            Card::make('Total Empleados', Employee::all()->count()),
            //Card::make($mx->name . ' Empleados', $mx->employees_count),
            //Card::make($us->name . ' Empleados', $us->employees_count),
            //Card::make($ar->name . ' Empleados', $ar->employees_count),
            Card::make('MX Employees', $mx ? $mx->employees_count : 0)
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('US Employees', $us ? $us->employees_count : 0),
            Card::make('AR Employees', $ar ? $ar->employees_count : 0)
            ->color('success'),
            ];
    }
}
