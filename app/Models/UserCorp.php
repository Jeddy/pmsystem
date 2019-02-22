<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Corp;

class UserCorp extends Model
{
    /**
     * 获得公司的用户
     *
     * @return Models objects
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * 设置用户当前默认的公司
     *
     * @return boolean
     */
    public function setDefaultCorp($uid, $corp_id) {
        $this->where(['uid' => $uid])->update(['is_default' => 0]);
        return $this->where(['uid' => $uid, 'corp_id' => $corp_id])->update(['is_default' => 1]);
    }

    /**
     * 获取用户当前默认的公司
     *
     * @return mixed
     */
    public function getDefaultCorp($uid) {
    	$default = $this->where(['uid' => $uid, 'is_default' => 1])->first();
    	if(!$default) {
    		$default = $this->where('uid', $uid)->first();
    		if(!$default) {
    			return null;
            }
    	}
    	return (new Corp)->getCorpById($default->corp_id);
    }
}
