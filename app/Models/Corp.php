<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    protected $primaryKey = 'corp_id';

    /**
     * 获取主体信息
     *
     * @return App\Models\Corps
     */
    public function getCorpById($corp_id) {
        return $this->find($corp_id);
    }

    /**
     * 获取主体下的空间
     *
     */
    public function spaces() {
        return $this->hasMany(Space::class, 'corp_id');
    }

    /**
     * 获取主体下的部门
     *
     */
    public function departments() {
        return $this->hasMany(Department::class, 'depart_id');
    }

}
