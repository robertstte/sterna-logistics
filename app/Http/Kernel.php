<?php 

namespace App\Http;

class Kernel extends HttpKernel
{
	protected $routeMiddleware = [
		'auth' => \App\Http\Middleware\Authenticate::class
	];
}