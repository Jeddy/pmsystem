<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;
use App\Models\UserCorp;

class CorpController extends Controller
{
    /**
     * 主体空间页
     */
    public function spaces(Request $request, Corp $corp) {

        // 设置默认主体
        (new UserCorp)->setDefaultCorp($request->user()->uid, $corp->corp_id);

        // 返回主体下的空间
        $spaces = $corp->spaces()->where('status', '<>', 2)->get();
    	return view('corp.spaces', compact('spaces'));
    }

    /**
     * 引导创建主体
     */
    public function guide() {
        return view('corp.guide');
    }

    /**
     * 创建主体
     */
    public function create() {
        return view('corp.create');
    }

}
