<?php
require_once 'redis.class.php';
$redis = new RedisObj();
// 解决Redis客户端订阅时候超时情况
$redis->setOption();
$redis->psubscribe(array('__keyevent@0__:expired'), 'keyCallback');
// 回调函数,这里写处理逻辑
function keyCallback($redis, $pattern, $chan, $msg)
{
    echo "Pattern: $pattern\n";
    echo "Channel: $chan\n";
    echo "Payload: $msg\n\n";
}
