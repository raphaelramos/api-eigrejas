<?php
namespace App\Http\Middleware;

use Closure;
use Session; use Auth; use Redirect;

class ContentPanel
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next)
	{
		abort_if(!@Auth::user()->permissionsGroup->content_status, 403, 'Sem Permissão');

		return $next($request);
	}
}
