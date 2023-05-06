<?php

namespace App\Providers;

use App\Models\AboutCompany;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);

        if ( !app()->runningInConsole() ){

            // $company_info = AboutCompany::first();

            // View::Share(compact("company_info"));
            if ( !app()->runningInConsole() ){
                $company_info = AboutCompany::first();

                View::Share(compact("company_info"));

            }
        }
    }
}
