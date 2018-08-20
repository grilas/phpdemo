<?php 


#测试网址:   http://g.git.com/base/get_url.php?id=6&sdf=5

//获取域名或主机地址 
echo '$_SERVER["HTTP_HOST"]: ========>'.$_SERVER["HTTP_HOST"]; 
echo "<br><br>";
// g.git.com

echo '$_SERVER["SERVER_NAME"]: ========>'.$_SERVER["SERVER_NAME"]; 
echo "<br><br>";
// g.git.com

//正在浏览当前页面用户的 IP 地址:127.0.0.1
echo '$_SERVER["REMOTE_ADDR"]: ========>'.$_SERVER["REMOTE_ADDR"]; 
echo "<br><br>";
// g.git.com

echo '$_SERVER["SERVER_PORT"]: ========>'.$_SERVER["SERVER_PORT"]; 
echo "<br><br>";
// 80

//获取网页地址 
echo '$_SERVER["PHP_SELF"]: ========>'.$_SERVER["PHP_SELF"];
echo "<br><br>";
//  /base/get_url.php

//获取网址参数 
echo '$_SERVER["QUERY_STRING"]: ========>'.$_SERVER["QUERY_STRING"];
echo "<br><br>";
//  id=6&sdf=5

echo '$_SERVER["REQUEST_URI"]: ========>'.$_SERVER["REQUEST_URI"];
echo "<br><br>";
//  /base/get_url.php?id=6&sdf=5

//获取用户代理,当前页面的前一页面的地址
if(isset($_SERVER["HTTP_REFERER"])){
	echo '$_SERVER["HTTP_REFERER"]: ========>'.$_SERVER["HTTP_REFERER"];
	echo "<br><br>";
}else{
	echo '$_SERVER["HTTP_REFERER"]: ========>';
	echo "<br><br>";
}

//获取完整的url
echo "获取完整的url========>".'"http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]<br>';
echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
echo "<br><br>";

echo "获取完整的url========>".'"http://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]<br>';
echo "http://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"];
echo "<br><br>";
#http://localhost/blog/testurl.php?id=5

//包含端口号的完整url
echo "包含端口号的完整url========>".'"http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]<br>';
echo "http://".$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
echo "<br><br>";
#http://localhost:80/blog/testurl.php?id=5

//只取路径
echo '只取路径========> $url="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; echo dirname($url);<br>';
$url="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; 
echo dirname($url);
#http://localhost/blog

/*
相同点：
当满足以下三个条件时，两者会输出相同信息。
1. 服务器为80端口
2. apache的conf中ServerName设置正确
3. HTTP/1.1协议规范

不同点：
1. 通常情况：
_SERVER["HTTP_HOST"] 在HTTP/1.1协议规范下，会根据客户端的HTTP请求输出信息。
_SERVER["SERVER_NAME"] 默认情况下直接输出apache的配置文件httpd.conf中的ServerName值。

2. 当服务器为非80端口时：
_SERVER["HTTP_HOST"] 会输出端口号，例如：mimiz.cn:8080
_SERVER["SERVER_NAME"] 会直接输出ServerName值
因此在这种情况下，可以理解为：HTTP_HOST = SERVER_NAME : SERVER_PORT

3. 当配置文件httpd.conf中的ServerName与HTTP/1.0请求的域名不一致时：
httpd.conf配置如下：
<virtualhost *>
ServerName mimiz.cn
ServerAlias www.mimiz.cn
</virtualhost>
客户端访问域名www.mimiz.cn
_SERVER["HTTP_HOST"] 输出 www.mimiz.cn
_SERVER["SERVER_NAME"] 输出 mimiz.cn

所以，在实际程序中，应尽量使用_SERVER["HTTP_HOST"] ，比较保险和可靠。
*/
