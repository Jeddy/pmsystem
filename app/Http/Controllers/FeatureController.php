<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;

class FeatureController extends Controller
{
    public function index(Space $space) {
    	return view('feature.index', compact('space'));
    }
}
