<?php

namespace App\Modules;
use File;
use Config;
use Blade;

class ServiceProvider extends  \Illuminate\Support\ServiceProvider{

    public function boot(){

        $directories = array_map('basename', File::directories(__DIR__));
        foreach ($directories as $moduleName) {
            $this->_registerModule($moduleName);
        }

        Blade::directive('theme_include', function ($string_params){
            $html = '{!! theme_include('.$string_params.') !!}';
            return $html;
        });

    }

    private function _registerModule($moduleName) {
        $modulePath = __DIR__ . "/$moduleName/";
        if(file_exists(__DIR__.'/'.$moduleName.'/routes.php')) {
            include __DIR__.'/'.$moduleName.'/routes.php';
        }

        // boot migration
        if (File::exists($modulePath . "Migrations")) {
            $this->loadMigrationsFrom($modulePath . "Migrations");
        }
        // boot views
        if (File::exists($modulePath . "Views")) {
            $this->loadViewsFrom($modulePath . "Views", $moduleName);
        }
    }

    public function register(){

    }
}
