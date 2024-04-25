<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */


namespace shaoyv8\dmall;

use Hanson\Foundation\Foundation;

class Dmall extends Foundation
{
    protected $providers = [
        Card\ServiceProvider::class, 
        Member\ServiceProvider::class,
        Order\ServiceProvider::class,
        Ware\ServiceProvider::class, 
    ];

}