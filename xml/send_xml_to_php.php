<?php
include "../common/func.php";
/* 以post的方式提交xml*/
$current_dir = dirname(__FILE__);
$current_dir = str_replace('\\',"/",$current_dir);

$xml_file = $current_dir."/1.xml";

if(file_exists($xml_file)){
	$xmlstr_fopen = fopen($xml_file, 'r');
	//clearstatcache();
	$xml_str = fread($xmlstr_fopen,filesize($xml_file));
	fclose($xmlstr_fopen);

	//$xml_str = file_get_contents($xml_file);
	//指定读取大小，这里把整个文件内容读取出来
}else{
	$xml_str = '<?xml version="1.0" encoding="utf-8"?><letter>
	<note>
		<to>哦。</to>
		<from>本地</from>
		<heading>哦哦哦</heading>
		<body>找不到文件</body>
	</note></letter>';
}

$url = DEMOURL."/xml/xml_http_post.php";
curl_post_xml($url,$xml_str);
?>