<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Models\Setting as Setting;
use Config;

class SettingsServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// get all settings from the database
		$settings = Setting::all();

		// bind all settings to the Laravel config, so you can call them like
		// Config::get('settings.contact_email')
		foreach ($settings as $key => $setting) {
			Config::set('settings.'.$setting->key, $setting->value);
		}
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
