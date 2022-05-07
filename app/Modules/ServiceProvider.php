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

        if(file_exists(__DIR__.'/Helpers.php')) {
            include __DIR__.'/Helpers.php';
        }

        Blade::directive('theme_include', function ($string_params){
            $html = '{!! theme_include('.$string_params.') !!}';
            return $html;
        });
    }

    private function _registerModule($moduleName) {
        $modulePath = __DIR__ . "/$moduleName/";

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