<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */


namespace shaoyv8\dmall\Member;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['user'] = static function ($pimple) {
            return new Order($pimple['config']->get('app-key'), $pimple['config']->get('app-secret'), $pimple['config']->get('app-token'), $pimple['config']->get('url'));
        };
    }

}