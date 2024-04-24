<?php
/**
 * 福建瑞享云图网络科技有限公司
 * Author: flynn
 * Date: 2024/4/24
 */

namespace shaoyv8\dmall;

use Hanson\Foundation\AbstractAPI;
use shaoyv8\dmall\Signature;

class Api extends AbstractAPI
{
    protected $appKey;

    public $appSecret;

    protected $signature;

    protected $url;

    protected $accessToken;

    public function __construct($appKey,$appSecret,$accessToken, $url)
    {
        $this->url = 'https://open-api.dmall.com';
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->accessToken = $accessToken;
        $this->signature = new Signature($this->appKey,$this->appSecret, $this->accessToken);
    }

    /** 
     * 请求接口
     * @param $path
     * @param array $params
     * @return mixed
     * @author: flynn
     * @Time: 2024/4/24
     */
    public function request($path, $params = [])    
    {
        $curl = curl_init();
        $timestamp = date('yyyy-MM-dd HH:mm:ss');
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "app-key: ".$this->appKey,
            "Content-Type: application/x-www-form-urlencoded",
            "token:".$this->accessToken,
            "sign-method: MD5",
            "timestamp: ".$timestamp,
            "sign: ".$this->signature->generateSignature($timestamp, $params),
        ]);
        curl_setopt($curl, CURLOPT_URL, $this->url . $path);         // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 64); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));		// Post提交的数据包
        curl_setopt($curl, CURLOPT_POST, 1);		// 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// 获取的信息以文件流的形式返回
        curl_setopt($curl,CURLOPT_ENCODING, '');

        $output = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new HttpException(curl_error($curl));
        }

        curl_close($curl);

        $result = json_decode($output, true);

        $this->checkAndThrow($result);

        return $result;
    }

    /** 
     * 检查错误
     * @param $result
     * @author: flynn
     * @Time: 2024/4/24
     */
    private function checkAndThrow($result)
    {
        if ($result['success'] === 'false') {
            throw new HttpException($result['messages'][0], $result['code']);
        }
    }

    /**
     * 中间件
     * @return mixed|void
     * @author: flynn
     * @Time: 2024/4/24
     */
    public function middlewares()
    {
    }

}