<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyDisplayer;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		return parent::render($request, $e);
	}

	/**
	 * Render a HTTP exception, including a custom error message.
	 *
	 * @param  \HttpException  $e
	 * @return \Illuminate\Http\Response
	 */
	protected function renderHttpException(HttpException $e) {
	    $status = $e->getStatusCode();

	    if (!config('app.debug') && view()->exists("errors.{$status}")) {
	      return response()->view("errors.{$status}", compact('e'), $status);
	    }
	    else {
	      return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
	    }
	  }

}
