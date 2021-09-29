<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class errorController extends Controller
{
    public function notfound(){
    	echo 'page does not exists';
    }
}
