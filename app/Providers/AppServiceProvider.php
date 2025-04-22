<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $generalSetting = [];

        if (DB::connection()->getDatabaseName()) {
            
            $generalSetting = GeneralSetting::where('id', 1)->first();
        }

        View::share('generalSetting', $generalSetting);
    }
}
