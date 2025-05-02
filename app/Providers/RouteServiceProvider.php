<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * Le chemin vers la route "home" pour votre application.
     *
     * Habituellement, les utilisateurs sont redirigés ici après l'authentification.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Définir les liaisons de modèle de route, les filtres de motifs et d'autres configurations de route.
     */
    public function boot(): void
    {
        // Configurer la limitation des requêtes
        $this->configureRateLimiting();

        // Définir les routes
        $this->routes(function () {
            // Routes API
            Route::middleware('api')
                ->prefix('api')  // Utilisation du préfixe 'api' pour les routes API
                ->group(base_path('routes/api.php'));

            // Routes Web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configurer les limites de requêtes pour l'application.
     */
    protected function configureRateLimiting(): void
    {
        // Limiter les requêtes API à 60 par minute par utilisateur ou IP
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
