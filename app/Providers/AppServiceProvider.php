<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\Company;
use App\Models\InvoicePage;
use App\Models\Invoice;
use App\Models\Client;


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
        Schema::defaultStringLength(225);
        View::composer('*', function($view){
            $view->with([
                'Airports'=>Airport::all(),
                'Airlines'=>Airline::all(),
                'Companies'=>Company::all(), 
                'InvoicePager'=>InvoicePage::all(),
                'Clients'=>Client::all()
            ]);
        });
    }
}
