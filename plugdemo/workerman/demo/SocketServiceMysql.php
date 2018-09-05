<?php
use Workerman\Worker;
//echo dirname(__FILE__)."/Autoloader.php";
require_once __DIR__ . '/Autoloader.php';
require_once __DIR__.'/mysql/src/Connection.php';
// 创建一个Worker监听2345端口，使用http协议通讯
$worker = new Worker("tcp://127.0.0.1:2345");

$worker->onWorkerStart = function($worker)
{
    // 将db实例存储在全局变量中(也可以存储在某类的静态成员中)
    global $db;
    $db = new \Workerman\MySQL\Connection('127.0.0.1', '3306', 'root', 'root', 'oxygenerator');
};

// 接收到浏览器发送的数据时回复hello world给浏览器
$worker->onMessage = function($connection, $data)
{
	//$data = json_decode($data);
	$moblie = '17710062931';
	//验证传过来的字段
	global $db;
	$userinfo = $db->select('id')->from('user')->where("moblie='{$moblie}'")->row();
	if(empty($userinfo)){
		$userid = $db->insert('user')->cols(array('moblie'=>$moblie,'province'=>'北京','city'=>'朝阳','area'=>'北京市朝阳区望京soho','create_time'=>time()))->query();
	}else{
		$userid = $userinfo['id'];
	}
	//开始传入用户设备信息
	$wifinumber = '123';
	$eqtnumber = '456';
	$type = '1';
	$eqtinfo = $db->select('id')->from('usereqtinfo')->where("userid='{$userid}' and wifinumber='{$wifinumber}' and type={$type}")->row();
	$eqtData['userid'] = $userid;
	$eqtData['moblie'] = $moblie;
	$eqtData['wifinumber'] = $wifinumber;
	$eqtData['eqtnumber'] = $eqtnumber;
	$eqtData['type'] = $type;
	$eqtData['typeinfo'] = '';
	$eqtData['status'] = 1;
	$eqtData['create_time'] = time();
	if(empty($eqtinfo)){
		$usereqtinfo = $db->insert('usereqtinfo')->cols($eqtData)->query();
	}else{
		$usereqtinfo = $db->update('usereqtinfo')->cols($eqtData)->where("userid='{$userid}' and wifinumber='{$wifinumber}' and type={$type}")->query();
	}
	$usereqtinfo_log = $db->insert('usereqtinfo_log')->cols($eqtData)->query();
    // 向浏览器发送hello world
    $connection->send(json_encode($userinfo));
};
//php D:/www/php/workerman/socketService.php
//php D:/www/php/socketClient.php
// 运行worker
Worker::runAll();