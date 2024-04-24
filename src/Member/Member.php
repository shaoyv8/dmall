<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */


namespace shaoyv8\dmall\Member;


use shaoyv8\dmall\Api;

class Member extends Api
{
    //外部商家会员新增同步多点会员系统
    const DMALL_MEMBER_BASIC_CREATE = "dmall.member.basic.create";
    //外部商家会员信息修改同步多点会员系统
    const DMALL_MEMBER_BASIC_UPDATE = "dmall.member.basic.update";
    
    public function memberBasicCreate($params)
    {
        return $this->request(self::DMALL_MEMBER_BASIC_CREATE, $params);
    }

    public function memberBasicUpdate($params)
    {
        return $this->request(self::DMALL_MEMBER_BASIC_UPDATE, $params);
    }
}