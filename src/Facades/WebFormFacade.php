<?php namespace Cristabel\WebForm\Facades;

use Illuminate\Support\Facades\Facade;

class WebFormFacade extends Facade {

    protected static function getFacadeAccessor() 
    {
		return 'webform';
	}

}
