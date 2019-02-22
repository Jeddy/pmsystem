<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCorp;

/**
 * 注册、登录后跳转统一控制
 * 根据实际需要重写
 */
class LoginedController extends Controller
{
    public function index(Request $request) {
        $uid = $request->user()->uid;
        $corp = (new UserCorp)->getDefaultCorp($uid);
    	if(!$corp) {
            // 没有关联公司，引导创建
            return redirect()->route('corp.guide');
    	} else {
            // 有关联公司，则跳转到默认主体空间页
            return redirect()->route('corp.spaces', ['corp' => $corp->corp_id]);
        }
    }
}
