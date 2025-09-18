<?php

namespace Projects\WellmedLite\Providers;

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
use Projects\WellmedLite\Supports\ConnectionManager as SupportsConnectionManager;

class WellmedLiteServiceProvider extends WellmedLiteEnvironment
{
    use NowYouSeeMe;

    public function register()
    {
        $this->registerMainClass(WellmedLite::class,false)
             ->registerCommandService(CommandServiceProvider::class)
             ->registerServices(function(){
                 $this->binds([
                    Contracts\WellmedLite::class => function(){
                        return new WellmedLite;
                    },
                    ConnectionManager::class => SupportsConnectionManager::class
                    //WorkspaceDTO\WorkspaceSettingData::class => WorkspaceSettingData::class
                ]);
            });
    }

    public function boot(Kernel $kernel){        
        $kernel->pushMiddleware(PayloadMonitoring::class);
        // $this->app->booted(function(){
            $model   = Facades\WellmedLite::myModel($this->TenantModel()->find(WellmedLite::ID));
            if (isset($model)){
                $this->deferredProviders($model);

                tenancy()->initialize(WellmedLite::ID);
                $tenant = tenancy()->tenant;
                $tenant->save();

                $config_name = Str::kebab($model->name); 

                $this->registers([
                    '*',
                    'Config' => function() {
                        $this->__config_wellmed_lite = config('wellmed-lite');
                    },
                    'Provider' => function() use ($model,$config_name){
                        $this->bootedRegisters($model->packages, $config_name, __DIR__.'/../'.$this->__config_wellmed_lite['libs']['migration'] ?? 'Migrations');
                        $this->registerOverideConfig($config_name,__DIR__.'/../'.$this->__config_wellmed_lite['libs']['config']);
                    },
                    'Model', 'Database'
                ]);
                $this->autoBinds();
                $this->registerRouteService(RouteServiceProvider::class);

                $this->app->singleton(PathRegistry::class, function () {
                    $registry = new PathRegistry();

                    $config = config("wellmed-lite");
                    foreach ($config['libs'] as $key => $lib) $registry->set($key, 'projects'.$lib);
                    return $registry;
                });
            }
        // });

    }

    public function checkClusterDatabase(): self{
        $model_connections = config('micro-tenant.database.model_connections');
        foreach ($model_connections as $key => $model_connection) {
            $model_connection['is_cluster'] ??= false;
            if (isset($model_connection['is_cluster']) && $model_connection['is_cluster']) {
                $connection = config('database.connections.'.$key);
            }
        }
        return $this;
    }
}
