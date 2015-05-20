<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App;
use Storage;
use Carbon\Carbon;

class LogController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');

		// Check for the right roles to access these pages
		if (!\Entrust::can('view-logs')) {
	        abort(403, 'Unauthorized access - you do not have the necessary permissions to see this page.');
	    }
	}

	public function index()
	{
		$disk = Storage::disk('local');
		$files = $disk->files('logs');
		$this->data['logs'] = [];

		// make an array of log files, with their filesize and creation date
		foreach ($files as $k => $f) {
			// only take the zip files into account
			if (substr($f, -4) == '.log' && $disk->exists($f)) {
				$this->data['logs'][] = [
											'file_path' => $f,
											'file_name' => str_replace('logs/', '', $f),
											'file_size' => $disk->size($f),
											'last_modified' => $disk->lastModified($f),
											];
			}
		}

		return view("admin/logs", $this->data);
	}

	/**
	 * Previews a log file.
	 *
	 * TODO: make it work no matter the flysystem driver (S3 Bucket, etc).
	 */
	public function preview($file_name)
	{
		if (!\Entrust::can('preview-logs')) {
	        abort(403, 'Unauthorized access - you do not have the necessary permission to preview logs.');
	    }

		$disk = Storage::disk('local');

		if ($disk->exists('logs/'.$file_name)) {
			$this->data['log'] = [
									'file_path' => 'logs/'.$file_name,
									'file_name' => $file_name,
									'file_size' => $disk->size('logs/'.$file_name),
									'last_modified' => $disk->lastModified('logs/'.$file_name),
									'content' => $disk->get('logs/'.$file_name),
									];

			return view("admin/log_item", $this->data);
		}
		else
		{
			abort(404, "The log file doesn't exist.");
		}
	}

	/**
	 * Downloads a log file.
	 *
	 * TODO: make it work no matter the flysystem driver (S3 Bucket, etc).
	 */
	public function download($file_name)
	{
		if (!\Entrust::can('download-logs')) {
	        abort(403, 'Unauthorized access - you do not have the necessary permission to download logs.');
	    }

		$disk = Storage::disk('local');

		if ($disk->exists('logs/'.$file_name)) {
			return response()->download(storage_path('logs/'.$file_name));
		}
		else
		{
			abort(404, "The log file doesn't exist.");
		}
	}

	/**
	 * Deletes a log file.
	 */
	public function delete($file_name)
	{
		if (!\Entrust::can('delete-logs')) {
	        abort(403, 'Unauthorized access - you do not have the necessary permission to delete logs.');
	    }

		$disk = Storage::disk('local');

		if ($disk->exists('logs/'.$file_name)) {
			$disk->delete('logs/'.$file_name);

			return 'success';
		}
		else
		{
			abort(404, "The log file doesn't exist.");
		}
	}
}
