<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */


namespace shaoyv8\dmall\Member;


use shaoyv8\dmall\Api;

class Order extends Api
{
    //根据订单号查询订单详情
    const DMALL_TRADE_ORDER_INFO_GET = "dmall.trade.order.info.get";
    const DMALL_TRADE_ORDER_LIST = "dmall.trade.order.list";

    public function TradeOrderInfoGet($params)
    {
        return $this->request(self::DMALL_TRADE_ORDER_INFO_GET, $params);
    }
    
    public function TradeOrderList($params)
    {
        return $this->request(self::DMALL_TRADE_ORDER_LIST, $params);
    }
}