<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $primaryKey = 'line_id';

    /**
     * 获取业务线的产品形态（如 C端业务线 包含 iOS APP、Android APP、web端等）
     *
     */
    public function products() {
    	return $this->hasMany(Product::class, 'product_id');
    }

    /**
     * 获取业务线的需求分类（如 C端业务线 包含 营销活动、会员、订单 等需求分类）
     *
     */
    public function categories() {
    	return $this->hasMany(Category::class, 'category_id');
    }
}
