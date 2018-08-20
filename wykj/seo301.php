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
$seo_file = "seo_file_301.php";
$handle = fopen($seo_file, 'w+') or die('Cannot open file: '.$seo_file);

$data_str = "";

while($arr = mysql_fetch_assoc($res)){
	$old_url = $arr['oldurl'];
	$new_url = $arr['newurl'];
	$data_str .= "Redirect permanent {$old_url} {$new_url}\n";
	echo $arr['id'].'成功<br>';
}
fwrite($handle, $data_str);
fclose($handle);
echo '成功<a href="/wykj/seo_file_301.php">seo_file_301</a>';