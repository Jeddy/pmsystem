<?php

// 获取当前路由名称
function route_class() {
    return str_replace('.', '-', Route::currentRouteName());
}