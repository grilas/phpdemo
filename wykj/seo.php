<?php
header("content-type:text/html;charset=utf-8");
$con = @mysql_connect("localhost","root","root");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_query("set names utf8");
mysql_select_db("phpcmsv9", $con);
$res = mysql_query("select * from seo order by id");
die("jinzhi");
$seo_file = "seo_file.html";
$handle = fopen($seo_file, 'w+') or die('Cannot open file: '.$seo_file);

$data_str = "";
$web_url="http://www.weyoungair.com";
$bendi_url = "http://g.v9.com";
$data_str = "<!DOCTYPE html>\n<html>\n<head>\n<meta charset='utf-8' />\n<title>seo</title>\n</head>\n<body>\n";

$news = 1;
$case = 1;
$error = 1;
$help = 1;
$pro = 1;
$biao = 1;
while($arr = mysql_fetch_assoc($res)){
	$old_url = $web_url.$arr['oldurl'];
	$new_url = $bendi_url.$arr['newurl'];
	if($arr['type'] == 'news'){
		$biao = $news++;
	}
	if($arr['type'] == 'case'){
		$biao = $case++;
	}
	if($arr['type'] == 'error'){
		$biao = $error++;
	}
	if($arr['type'] == 'help'){
		$biao = $help++;
	}
	if($arr['type'] == 'pro'){
		$biao = $pro++;
	}
	$data_str .= "<p>{$arr['type']}-{$biao} <a href='{$old_url}' target='_blank'>{$old_url}</a> | <a href='{$new_url}' target='_blank'>{$new_url}</a><p>";
	echo $arr['id'].'成功<br>';
	
}
$data_str .= "</body></html>";
fwrite($handle, $data_str);
fclose($handle);
echo '成功<a href="/wykj/seo_file.html">dianji</a>';