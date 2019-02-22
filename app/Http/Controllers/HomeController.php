<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 首页
 */
class HomeController extends Controller
{
    public function index() {
		return view('home.index');
	}
}
