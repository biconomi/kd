<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class checkAuth extends Controller
{
    public function checkAuth()
    {
    	if(Auth::check())
    	{
    		return 'true';
    	}
    	else
    	{
    		return 'false';
    	}
    }
}
