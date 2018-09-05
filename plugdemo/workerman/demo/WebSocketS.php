<?php
require_once dirname(dirname(__FILE__)) . '/Worker.php';
use Workerman\Worker;
require_once dirname(dirname(__FILE__)) . '/Autoloader.php';

// 注意：这里与上个例子不同，使用的是websocket协议
$ws_worker = new Worker("websocket://g.git.com:2000");

// 启动4个进程对外提供服务
$ws_worker->count = 1;

// 当收到客户端发来的数据后返回hello $data给客户端
$ws_worker->onMessage = function($connection, $data)
{
    // 向客户端发送hello $data
    $connection->send('hello ' . $data);
};

// 运行worker
Worker::runAll();


// 运行worker
//php D:/www/github/phpdemo/plugdemo/workerman/demo/WebSocketS.php
