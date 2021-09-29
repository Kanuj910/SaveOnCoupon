<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}
// if (!function_exists('active_route')) {
//     function active_route($route, $classname = 'active')
//     {
//         if (Route::currentRouteNamed($route) || Route::is($route)) {
//             return ' ' . $classname;
//         }

//         return '';
//     }
// }