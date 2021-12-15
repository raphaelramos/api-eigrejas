<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $dashboardNamespace = 'App\Http\Controllers\Dashboard';
    protected $apisNamespace = 'App\Http\Controllers\APIs';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->configureRateLimiting();
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapDashboardRoutes();
        $this->mapApisRoutes();
        $this->mapCentralRoutes();
        $this->mapWebRoutes();
        $this->mapUniversalRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware([
            'web',
            InitializeTenancyByDomainOrSubdomain::class,
            PreventAccessFromCentralDomains::class,
            ])
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapUniversalRoutes()
    {
        Route::middleware([
            'universal',
            InitializeTenancyByDomainOrSubdomain::class,
            ])
            ->namespace($this->namespace)
            ->group(base_path('routes/universal.php'));
    }

    protected function mapCentralRoutes()
    {
        foreach ($this->centralDomains() as $domain) {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/central.php'));
        }
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware([
                'api'
            ])
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "Dashboard" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapDashboardRoutes()
    {
        Route::prefix(\Config::get('app.backend_path'))
            ->middleware([
                'auth',
                InitializeTenancyByDomainOrSubdomain::class,
                PreventAccessFromCentralDomains::class,
                ])
            ->namespace($this->dashboardNamespace)
            ->group(base_path('routes/dashboard.php'));
    }

    /**
     * Define the "APIs" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApisRoutes()
    {
        Route::prefix("/api/v1")
            ->middleware([
                'api',
                InitializeTenancyByRequestData::class
            ])
            ->namespace($this->apisNamespace)
            ->group(base_path('routes/apis.php'));
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    // Tenancy central domains
    protected function centralDomains(): array
    {
        return config('tenancy.central_domains');
    }
}
