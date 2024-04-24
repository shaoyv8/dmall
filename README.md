# dmall
多点商城 SDK

## 安装

```
composer require shaoyv8/dmall:dev-master
```

## 文档

### 实例化

```php
$dmall = new \shaoyv8\dmall\Dmall([
    'url' => 'your-url',
    'app-key' => 'your-app-key',
    'app-secret' => 'your-app-secret',
    'app-token' => 'your-app-token',
]);
```

### 交易标准 API

#### 根据订单号查询订单详情

```php
$ticket = $dmall->TradeOrderInfoGet($sn);
```

#### 查询订单号列表接口

```php
$result = $dmall->TradeOrderList();
```
