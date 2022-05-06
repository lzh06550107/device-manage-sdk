<?php
/**
 * 文件描述
 * Created on 2022/4/18 19:07
 * Create by LZH
 */

namespace JuLongDeviceManage\Middleware\redis;

use EasySwoole\Redis\Redis;
use JuLongDeviceManage\Contracts\Publisher;

/**
 * redis中间件实现发布者
 */
class RedisPublisher implements Publisher
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
    public function publish(string $channels, string $message)
    {
        return $this->redis->publish($channels, $message); // 发布命令返回的消息
    }

}