<?php

namespace stekel\{{package-namespace}};

use Illuminate\Support\ServiceProvider;
use stekel\{{package-namespace}}\Laravel\Console\{{package-namespace}} as {{package-namespace}}Command;

class {{package-namespace}}ServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Config/{{package-shortname}}.php' => config_path('{{package-shortname}}.php'),
        ]);
        
        if ($this->app->runningInConsole()) {
            
            $this->commands([
                {{package-namespace}}Command::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../Config/{{package-shortname}}.php', '{{package-shortname}}'
        );
        
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            '{{package-shortname}}',
        ];
    }
}
