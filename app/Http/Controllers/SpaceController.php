<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;
use App\Models\UserCorp;

class SpaceController extends Controller
{
	// 工作空间列表
    public function index(Request $request) {
    	$corp = (new UserCorp)->getDefaultCorp($request->user()->uid);
    	if(!$corp) { // 用户没有关联公司
    		// todo
    	}
    	$spaces = $corp->spaces()->where('status', '<>', 2)->get();
    	return view('space.list', compact('spaces'));
    }

    // 工作空间
    public function content(Space $space, Request $request) {

    	return view('space.content', compact('space'));
    }

}
