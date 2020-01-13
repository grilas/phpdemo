<?php

/*$redis->connect('39.96.3.198',6379);
$redis->auth('123456'); //返回 true false
echo $redis->ping(); //检查是否还再链接,[+pong]*/

require_once 'redis.class.php';
$redis = new RedisObj(); 


$g = isset($_GET['g']) ? $_GET['g'] : 0;

if($g == 1){
	$redis->setex('name1',10,'10秒钟后将会消失');
	$redis->setex('name2',20,'20秒钟后将会消失');
}

echo "name1=>".$redis->get("name1")."<br>";
echo "name2=>".$redis->get("name2")."<br>";
?>