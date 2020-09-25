<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14
 * Time: 1:00
 */
namespace  Ioc\Service;
use Ioc\Contracts\SuperModuleInterface;

/**
 * X-超能量
 */
class XPower implements SuperModuleInterface
{
    public function activate(array $target)
    {
        // 这只是个例子。。具体自行脑补
        echo "hello x power";
    }
}
