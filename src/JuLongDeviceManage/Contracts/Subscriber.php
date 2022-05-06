<?php

namespace JuLongDeviceManage\Contracts;

/**
 * 不同中间件通用的订阅接口
 */
interface Subscriber
{

    /**
     * 订阅主题
     * @param string ...$channels
     * @return mixed
     * @author LZH
     * @since 2022/04/18
     */
    public function subscribe(callable $callback ,string ...$channels);

    /**
     * 取消订阅主题
     * @param string ...$channels
     * @return mixed
     * @author LZH
     * @since 2022/04/18
     */
    public function unsubscribe(string ...$channels);

}