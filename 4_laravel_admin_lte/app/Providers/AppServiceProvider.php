<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Position;
use App\Observers\EmployeeObserver;
use App\Observers\PositionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Position::observe(PositionObserver::class);
        Employee::observe(EmployeeObserver::class);
    }
}
