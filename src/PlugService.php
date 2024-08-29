<?php

declare(strict_types=1);

namespace qy\plugs;

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
    protected $name = 'plugs';

    public function bootRoute(Route $route)
    {
        $routePath = admin_route_path();
        // 路由检测
        $files = scandir($routePath);
        foreach ($files as $file) {
            if (strpos($file, '.php')) {
                $filename = $routePath . $file;
                // 导入路由配置
                $route->group($this->name, function () use ($filename) {
                    include_once($filename);
                })
                    ->prefix($this->namespace);
            }
        }
    }
}
