<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;
use App\Models\UserCorp;

class SpaceController extends Controller
{
    /**
     * xxx空间主页
     */
    public function index(Space $space, Request $request) {
    	return view('space.index', compact('space'));
    }

    /**
     * 创建空间
     */
    public function create() {
        return view('space.create');
    }

}
