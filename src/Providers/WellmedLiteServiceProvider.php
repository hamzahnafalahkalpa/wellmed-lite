<?php

namespace Projects\WellmedLite\Providers;

use Hanafalah\LaravelSupport\{
    Concerns\NowYouSeeMe,
    Supports\PathRegistry
};
use Projects\WellmedLite\{
    WellmedLite,
    Contracts,
    Facades
};
use Hanafalah\MicroTenant\Contracts\Supports\ConnectionManager;
use Hanafalah\MicroTenant\Facades\MicroTenant;
use Projects\WellmedLite\Contracts\Schemas\ModuleRegional\WellmedAddress;
use Projects\WellmedLite\Contracts\Schemas\ModuleWorkspace\Workspace;
use Projects\WellmedLite\Schemas\ModuleRegional\WellmedAddress as ModuleRegionalWellmedAddress;
use Projects\WellmedLite\Schemas\ModuleWorkspace\Workspace as ModuleWorkspaceWorkspace;
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
                        ConnectionManager::class => SupportsConnectionManager::class,
                        Workspace::class => ModuleWorkspaceWorkspace::class,
                        WellmedAddress::class => ModuleRegionalWellmedAddress::class
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

    public function boot(){        
        $this->registerModel();
        // $kernel->pushMiddleware(PayloadMonitoring::class);
        $this->app->booted(function(){
            try {
                $tenant = $this->TenantModel()->where('flag','APP')->where('props->product_type','WELLMED_LITE')->first();

                if (isset($tenant)){
                    $model  = Facades\WellmedLite::myModel($tenant);
                    $cache = app(config('laravel-support.service_cache'))->getConfigCache();

                    $this->registers([
                        '*', 
                        'Provider' => function() use ($model){
                            $this->bootedRegisters($model->packages, 'wellmed-lite', __DIR__.'/../'.$this->__config_wellmed_lite['libs']['migration'] ?? 'Migrations');
                            $this->registerOverideConfig('wellmed-lite',__DIR__.'/../'.$this->__config_wellmed_lite['libs']['config']);
                        },
                        'Model', 'Database'
                    ]);
                    MicroTenant::impersonate($tenant,false);    
                    ($this->checkCacheConfig('config-cache')) ? $this->multipleBinds(config('app.contracts')) : $this->autoBinds();
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
