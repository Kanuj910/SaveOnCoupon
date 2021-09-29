<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class jsonController extends Controller
{
    public function index()
    {
    	$str = '';
    	$data = json_decode($str,true);
echo '<pre>';
    	var_export($data);
echo '</pre>';
    }
}
