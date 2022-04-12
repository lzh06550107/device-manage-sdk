# 设备管理模块

## 简介

设备管理模块，主要负责和设备进行交互，包括设备上传和平台下发。同时包括后台对设备的管理，如对设备进行管理，协议进行管理。

### 统一设备管理

- 统一设备，设备数据管理。
- 向上提供统一的设备操作API，屏蔽各个厂家不同协议不同设备的差异。
- 使用中间件异步的进行设备消息收发。

### 多协议适配 

不同设备使用不同协议接入集成了各种常见的网络协议MQTT、HTTP等，并对其进行封装，实现统一管理等功能。降低网络编程的复杂度。多消息协议支持，将自定义的消息解析为平台统一的消息格式。

## 设计原理

- 设备上传信息处理流程

![avatar](doc/images/设备上传信息流程图.png)


- 设备下发信息处理流程

![avatar](doc/images/设备下发信息流程图.png)

## 技术选型

- PHP7.4
- Swoole4.8
- EasySwoole3.5
- 消息中间件使用redis(单机版本使用轻量级消息中间件，以后扩展为分布式部署的话，使用RabbitMQ、RocketMQ、Kafka等)
- Mysql5.7+
- Vue2/Layui

## 目录结构

~~~
device-manage-sdk         项目部署目录
├─src                     应用目录
│  ├─Common               通用常量和函数目录
│  ├─Exceptions           异常类目录
│  ├─Contracts            接口类目录
│  ├─Utility              工具目录
│  ├─Gateway              网关目录，需要多协议适配
│  ├─Middleware           中间件目录，需要多中间件适配
│  ├─device               设备后台管理目录
├─Bin                     应用bin文件目录
│  ├─app.sh               应用shell脚本
│  ├─easyswoole.service   easyswoole开机启动配置文件
├─Runtime                 运行时目录
│  ├─Log                  日志保存目录
│  ├─Temp                 临时信息、缓存目录
├─UnitTest                单元测试目录
├─vendor                  第三方类库目录
├─.php-cs-fixer.dist.php  php-cs-fixer代码格式规范工具配置文件
├─composer.json           Composer配置文件
├─composer.lock           Composer锁定文件
├─bootstrap.php           预处理或者是预定义
├─EasySwooleEvent.php     框架全局事件
├─easyswoole              框架管理脚本
├─phpunit.php             单元测试入口文件
├─dev.php                 开发配置文件
├─produce.php             生产配置文件
~~~