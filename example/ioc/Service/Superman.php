<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/14
 * Time: 0:57
 */
namespace  Ioc\Service;

use Ioc\Contracts\SuperModuleInterface;

class Superman
{
    protected $module;

    public function __construct(SuperModuleInterface $module)
    {
        echo "__construct";
        $this->module = $module;
    }

}