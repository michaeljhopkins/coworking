<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LangFiles;

class LangFilesServiceProvider extends ServiceProvider {

	/*protected $defer = true;*/

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('langfile', function($app){ return new LangFiles($app['config']['app']['locale']); });
	}

}
