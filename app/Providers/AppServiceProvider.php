<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Força o Laravel a reconhecer a pasta 'public' corretamente no cPanel
        $this->app->bind('path.public', function() {
            return base_path('public');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Força o uso de HTTPS em todos os links (CSS, JS, Imagens)
         * essencial para que o Vite/Build funcione no cPanel
         */
        if (config('app.env') === 'production' || config('app.debug') === false) {
            URL::forceScheme('https');
        }
    }
}