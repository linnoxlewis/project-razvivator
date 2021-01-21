<?php

namespace App\Modules;

class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $modules = config("modules.modules");
        if($modules) {
            foreach ($modules as $module){
                if(file_exists(__DIR__.'/'.$module.'/Routes/routes.php')) {
                    $this->loadRoutesFrom(__DIR__.'/'.$module.'/Routes/routes.php');
                }
                if(is_dir(__DIR__.'/'.$module.'/views')) {
                    $this->loadViewsFrom(__DIR__.'/'.$module.'/views', $module);
                }
                if(is_dir(__DIR__.'/'.$module.'/migrations')) {
                    $this->loadMigrationsFrom(__DIR__.'/'.$module.'/migrations');
                }
                if(is_dir(__DIR__.'/'.$module.'/assets')) {
                    $this->publishes([ __DIR__.'/'.$module.'/assets' => public_path('vendor/'.$module)], 'public');
                }
            }
        }
    }
    public function register(){}
}
