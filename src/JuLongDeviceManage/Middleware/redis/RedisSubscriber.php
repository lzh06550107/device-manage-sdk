<?php

namespace JuLongDeviceManage\Middleware\redis;

use EasySwoole\Redis\Redis;
use JuLongDeviceManage\Contracts\Subscriber;

/**
 * redis中间件来实现订阅者
 */
class RedisSubscriber implements Subscriber
{

    /**
     * @var Redis redis 客户端
     */
    private $redis;

    /**
     * 传入中间件客户端对象
     */
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @inheritDoc
     */
    public function subscribe(callable $callback, string ...$channels)
    {
        return $this->redis->subscribe($callback, $channels); // 订阅会被阻塞，如果没有读取到订阅消息，则返回false
    }

    /**
     * @inheritDoc
     */
    public function unsubscribe(string ...$channels)
    {
        return $this->redis->unsubscribe($channels); // 取消订阅命令返回的消息
    }


}