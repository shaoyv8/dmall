<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */


namespace shaoyv8\dmall;

use Hanson\Foundation\Foundation;

/**
 * Class dmall
 * @package shaoyv8\dmall
 * @property \shaoyv8\dmall\Card\Card $card
 * @property \shaoyv8\dmall\Member\Member $member
 * @property \shaoyv8\dmall\Order\Order $order
 * @property \shaoyv8\dmall\Ware\Ware  $ware
 */
class Dmall extends Foundation
{
    public $providers = [
        Card\ServiceProvider::class, 
        Member\ServiceProvider::class,
        Order\ServiceProvider::class,
        Ware\ServiceProvider::class, 
    ];
}