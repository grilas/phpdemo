<?php
use Workerman\Worker;
require_once __DIR__ . '/Autoloader.php';
require_once __DIR__.'/mysql/src/Connection.php';

// 创建一个Worker监听2345端口，使用http协议通讯
$worker = new Worker("tcp://123.56.242.133:8087");

$worker->onWorkerStart = function($worker)
{
    // 将db实例存储在全局变量中(也可以存储在某类的静态成员中)
    global $db;
    $db = new \Workerman\MySQL\Connection('127.0.0.1', '3306', 'root', 'Wy20170926$909933', 'test');
};

// 接收到浏览器发送的数据时回复hello world给浏览器
$worker->onMessage = function($connection, $data)
{
	$info = json_encode($data);
	global $db;
	$insert = "insert into weiyang(content) values('$info')";  
    $pdo->exec($insert);  
    // 向浏览器发送hello world
    $connection->send("This is you send info:".$info);

};
//php D:/www/php/workerman/socketService.php
//php D:/www/php/socketClient.php
// 运行worker
Worker::runAll();

//php.exe D:/www/Svn/workman/SocketS.php
//Fatal error: Uncaught exception 'PDOException' with message