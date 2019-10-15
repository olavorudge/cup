<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('components.checkbox', 'checkbox');
        Blade::component('components.datepicker', 'datepicker');
        Blade::component('components.filepicker', 'filepicker');
        Blade::component('components.input', 'input');
        Blade::component('components.select', 'select');
        Blade::component('components.table', 'table');
        Blade::component('components.textarea', 'textarea');
    }
}
