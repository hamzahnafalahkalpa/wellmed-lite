<?php

namespace Projects\WellmedLite\Providers;

use Hanafalah\ApiHelper\Facades\ApiAccess;
use Illuminate\Foundation\Http\Kernel;
use Hanafalah\LaravelSupport\{
    Concerns\NowYouSeeMe,
    Supports\PathRegistry
};
use Illuminate\Support\Str;
use Projects\WellmedLite\{
    WellmedLite,
    Contracts,
    Facades
};
use Hanafalah\LaravelSupport\Middlewares\PayloadMonitoring;
use Hanafalah\MicroTenant\Contracts\Supports\ConnectionManager;
use Hanafalah\MicroTenant\Facades\MicroTenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Projects\WellmedLite\Supports\ConnectionManager as SupportsConnectionManager;

class WellmedLiteServiceProvider extends WellmedLiteEnvironment
{
    use NowYouSeeMe;

    public function register()
    {
        $this->registerMainClass(WellmedLite::class,false)
             ->registerCommandService(CommandServiceProvider::class)
            ->registers([
                'Services' => function(){
                    $this->binds([
                        Contracts\WellmedLite::class => function(){
                            return new WellmedLite;
                        },
                        ConnectionManager::class => SupportsConnectionManager::class
                        //WorkspaceDTO\WorkspaceSettingData::class => WorkspaceSettingData::class
                    ]);   
                },
                'Config' => function() {
                    $this->__config_wellmed_lite = config('wellmed-lite');
                },
                'Provider' => function(){
                    $this->registerOverideConfig('wellmed-lite',__DIR__.'/../'.$this->__config_wellmed_lite['libs']['config']);
                }
            ]);
    }

    public function boot(Kernel $kernel){        
        $kernel->pushMiddleware(PayloadMonitoring::class);
        $this->app->booted(function(){
            try {
                $tenant = $this->TenantModel()->where('flag','APP')->where('props->product_type','WELLMED_LITE')->first();
                if (isset($tenant)){
                    MicroTenant::tenantImpersonate($tenant);
                    // Event::listen(\Laravel\Octane\Events\RequestReceived::class, function ($event) use ($tenant) {
                    //     MicroTenant::tenantImpersonate($tenant);
                    //     ApiAccess::init()->accessOnLogin(function ($api_access) {
                    //         Auth::setUser($api_access->getUser());
                    //     //     // tenancy()->end();
                    //     //     // tenancy()->initialize($microtenant?->tenant->model ?? $microtenant?->group->model ?? $microtenant?->project->model);
                    //     });
                    //     // tenancy()->end();
                    //     // tenancy()->initialize($tenant);
                    // });
    
                    $model  = Facades\WellmedLite::myModel($tenant);
                    $this->deferredProviders($model);
        
                    $this->registers([
                        '*', 
                        'Provider' => function() use ($model){
                            $this->bootedRegisters($model->packages, 'wellmed-lite', __DIR__.'/../'.$this->__config_wellmed_lite['libs']['migration'] ?? 'Migrations');
                            $this->registerOverideConfig('wellmed-lite',__DIR__.'/../'.$this->__config_wellmed_lite['libs']['config']);
                        },
                        'Model', 'Database'
                    ]);
                    $this->autoBinds();
                    // tenancy()->end();
                    // tenancy()->initialize($tenant);
                    $this->registerRouteService(RouteServiceProvider::class);
        
                    $this->app->singleton(PathRegistry::class, function() use ($tenant) {
                        $registry = new PathRegistry();
        
                        $config = config("wellmed-lite");
                        foreach ($config['libs'] as $key => $lib) $registry->set($key, 'projects'.$lib);
                        
                        return $registry;
                    });
                }
            } catch (\Throwable $th) {
            }
        });
    }    
}
