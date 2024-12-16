<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Menambahkan aturan validasi kustom 'nim'
        Validator::extend('nim', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]{10}$/', $value); // Misalnya validasi angka 8 digit
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Lakukan registrasi layanan lainnya jika perlu
    }
}
