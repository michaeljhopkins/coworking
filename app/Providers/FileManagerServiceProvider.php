<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Barryvdh\Elfinder\ElfinderServiceProvider as ElfinderServiceProvider;

/**
 * Service Provider that overwrites ElfinderServiceProvider.
 * Its main purpose is to define the routes inside at register() time, instead of boot(),
 * because otherwise the Dick/PageManager catch-all route will be run before it.
 */
class FileManagerServiceProvider extends ElfinderServiceProvider {

	/**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
    	$config = $this->app['config']->get('elfinder.route', []);
        $config['namespace'] = 'Barryvdh\Elfinder';

        $router->group($config, function($router)
        {
            $router->get('/', 'ElfinderController@showIndex');
            $router->any('connector', ['as' => 'elfinder.connector', 'uses' => 'ElfinderController@showConnector']);
            $router->get('popup/{input_id}', ['as' => 'elfinder.popup', 'uses' => 'ElfinderController@showPopup']);
            $router->get('tinymce', ['as' => 'elfinder.tinymce', 'uses' => 'ElfinderController@showTinyMCE']);
            $router->get('tinymce4', ['as' => 'elfinder.tinymce4', 'uses' => 'ElfinderController@showTinyMCE4']);
            $router->get('ckeditor', ['as' => 'elfinder.ckeditor', 'uses' => 'ElfinderController@showCKeditor4']);
        });
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->setupRoutes($this->app->router);
        parent::register();
	}


}
