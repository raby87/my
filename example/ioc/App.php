<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14
 * Time: 1:11
 */
namespace Ioc;
use Ioc\Core\Container;
use Ioc\Service\Superman;
use Ioc\Service\UltraBomb;
use Ioc\Service\XPower;

class App
{
    public function boot(){
        // 创建一个容器（后面称作超级工厂）
                $container = new Container;

        // 向该 超级工厂添加超人的生产脚本
                $container->bind('superman', function($container, $moduleName) {
                    return new Superman($container->make($moduleName));
                });

        // 向该 超级工厂添加超能力模组的生产脚本
                $container->bind('xpower', function($container) {
                    return new XPower;
                });

        // 同上
                $container->bind('ultrabomb', function($container) {
                    return new UltraBomb;
                });

        // ****************** 华丽丽的分割线 **********************
        // 开始启动生产
        $superman_1 = $container->make('superman', ['xpower', [ 99 ] ]);
         //       $superman_1 = $container->make('superman', ['xpower']);
           //     $superman_2 = $container->make('superman', 'ultrabomb');


           $xpower = $container->make('xpower');
       // var_dump($xpower($container)->activate([]));
        var_dump($superman_1);
    }
}
