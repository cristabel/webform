<?php namespace Cristabel\WebForm\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class WebFormServiceProvider extends ServiceProvider {

	public function register()
	{
        $this->registerWebFormFacade();
	}

	public function boot()
	{
        
	}

    protected function registerWebFormFacade()
    {
        $this->app->bind(
            'webform',
            function () {
                return new \Cristabel\WebForm\WebForm;
            }
        );

        AliasLoader::getInstance()->alias('WebForm', 'Cristabel\WebForm\Facades\WebFormFacade');
    }
    
}
