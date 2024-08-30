<?php

declare(strict_types=1);

namespace qyPlugs;

use think\Service;
use think\Route;

function admin_path($path = '')
{
    return __DIR__ . '/' . ltrim($path, '/');
}
function admin_route_path($path = '')
{
    return admin_path('route/') . ltrim($path, '/');
}

class PlugService extends Service
{
    public function getPlugInfo() {}
    /**
     * 控制器命名空间.
     *
     * @var string
     */
    protected $namespace = '\\plugs\\controller\\';
    /**
     * 路由分组名.
     *
     * @var string
     */
    protected $name = 'plu';

    public function boot(Route $route)
    {
        $this->bootRoute($route);
    }

    public function bootRoute(Route $route)
    {
        $route->group($this->name, function () {
            \think\facade\Route::get('/auth/signature', \qyPlugs\controller\Auth::class . '/signature');
        });
    }
}
