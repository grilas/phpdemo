<?php
$redis = new Redis(); 
$redis->connect('127.0.0.1',6379);
$bb=$redis->auth('12345'); //返回 true false
var_dump($bb);
$aa = $redis->ping(); //检查是否还再链接,[+pong]
var_dump($aa);
?>