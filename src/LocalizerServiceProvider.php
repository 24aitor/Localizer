<?php

namespace Aitor24\Localizer;

use Illuminate\Support\ServiceProvider;

class LocalizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->publishes([
            __DIR__.'/Config/localizer.php' => config_path('localizer.php'),
            __DIR__.'/Assets'              => public_path('vendor/Aitor24/Localizer'),
        ], 'localizer_pkg');

        $router->middleware('localizer.middleware', Aitor24\Localizer\Middleware\LocalizerMiddleware::class);

        $this->app->register(LaralangServiceProvider::class);

        $this->loadViewsFrom(__DIR__.'/Views', 'localizer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
