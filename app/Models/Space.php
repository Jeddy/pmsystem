<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $primaryKey = 'space_id';

    public function getNameAttributes() {
    	return $this->name;
    }

    /**
     * 获取空间下的业务线
     *
     */
    public function lines() {
    	return $this->hasMany(Line::class, 'line_id');
    }

}
