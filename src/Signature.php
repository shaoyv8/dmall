<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */

namespace shaoyv8\dmall;


class Signature
{
    protected $appKey;
    protected $secret;
    protected $token;


    public function __construct($appKey,$secret,$token)
    {
        $this->appKey = $appKey;
        $this->secret = $secret;
        $this->token = $token;
    }
    
    public function generateSignature($timestamp,$params){
        $stringToSign  = $this->buildSignString($timestamp,$params);
        return $this->md5ThenBase64(strtoupper($stringToSign));
    }
    
    public  function buildSignString($timestamp,$params){
        $params["app-key"] =  $this->appKey;
        $params["token"] = $this->token;
        $params["sign-method"] = 'MD5';
        $params["timestamp"] = $timestamp; 
        ksort($params);
        $resultStr = "";
        foreach ($params as $key => $val) {
            if ($key != null && $key != "" ) {
                $resultStr = $resultStr . $key . $val;
            }
        }
        return strtoupper($resultStr);
    } 
    
    public  function md5ThenBase64($stringToSign){
        return MD5($stringToSign,true);
    }
}