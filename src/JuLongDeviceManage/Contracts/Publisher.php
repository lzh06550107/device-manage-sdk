<?php

namespace JuLongDeviceManage\Contracts;

/**
 * 不同中间件通用的发布接口
 */
interface Publisher
{

    /**
     * 发布消息
     * @param string $channels
     * @param string $message
     * @return mixed
     * @author LZH
     * @since 2022/04/18
     */
    public function publish(string $channels, string $message);

}