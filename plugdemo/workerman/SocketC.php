<?php
error_reporting(E_ALL);
set_time_limit(0);
//header("Content-type: text/html; charset=gbk"); 
echo "<h2>TCP/IP Connection</h2>\n";

$port = 8087;
$ip = "123.56.242.133";

/*
 +-------------------------------
 *    @socket连接整个过程
 +-------------------------------
 *    @socket_create
 *    @socket_connect
 *    @socket_write
 *    @socket_read
 *    @socket_close
 +--------------------------------
 */

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
}else {
	
    echo "create OK.\n";
}

echo "attemp '$ip' port '$port'...\n";
$result = socket_connect($socket, $ip, $port);
if ($result < 0) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
}else {
    echo "connet OK\n";
}

$in = "hellow i am here!\r\n";
$out = '';

if(!socket_write($socket, $in, strlen($in))) {
    echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
}else {
    echo "send data succes to service!\n";
    echo "the content is:<font color='red'>$in</font>\n";
}

while($out = socket_read($socket, 8192)) {
    echo "receive info on the service!\n";
    echo "receive info is:",$out;
}


echo "close SOCKET...\n";
socket_close($socket);
echo "close OK\n";
//D:\phpStudy\php\php-5.6.27-nts
?>