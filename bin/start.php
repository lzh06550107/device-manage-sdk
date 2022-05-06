<?php

// 启动文件

declare(strict_types=1);

foreach (
    [
        __DIR__ . '/vendor/autoload.php',
        __DIR__ . '/../vendor/autoload.php',
        __DIR__ . '/../../vendor/autoload.php',
        __DIR__ . '/../../../vendor/autoload.php',
        __DIR__ . '/../../../autoload.php',
    ] as $file
) {
    if (file_exists($file)) {
        require $file;
        break;
    }
}

$redis = [
    "host" => "127.0.0.1",
    "port" => 6379,
    "auth" => ""
];

$redisConfig = new \EasySwoole\Redis\Config\RedisConfig($redis);
$redisPoolConfig = \EasySwoole\RedisPool\RedisPool::getInstance()->register($redisConfig);
//配置连接池连接数
$redisPoolConfig->setMinObjectNum(5);
$redisPoolConfig->setMaxObjectNum(20);

//defer方式获取连接
$redis = \EasySwoole\RedisPool\RedisPool::defer();
//获取连接池对象
$redisPool = \EasySwoole\RedisPool\RedisPool::getInstance()->getPool();
//回收redis连接
$redisPool->recycleObj($redis);

//invoke方式获取连接
//\EasySwoole\RedisPool\RedisPool::invoke(function (\EasySwoole\Redis\Redis $redis) {
//    var_dump($redis->set('a', 1));
//});


