<?php
//=============================

/*  字符串翻转 */


$a = 3;
echo "$a",' | ','$a',' | ',"\\\$a",' | ',"${a}",' | ',"$a",' | ','${a}',' | ',"$a"+"$a";
// 3 | $a | \$a | 3 | 3 | ${a} | 6
echo "<br>";
echo "$a".'$a'."\\\$a"."${a}"."$a".'${a}'."$a"+"$a";
//6


//=============================

/*$con = mysql_connect("localhost","test","111111");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("test", $con);
$result = mysql_query("SELECT * FROM user where name='张三'");
while($row = mysql_fetch_array($result))
{
	print_r($row['content']);
}
mysql_close($con);*/

echo "<hr>";
/*$aa = @foo();
var_dump($aa);*/
echo 1111;
echo "<br><hr>";
class test{
	function Get_test($num){
		$num = md5(md5($num)."En");
		return $num;
	}
}

//用于密码之类的加密
//使用方法如下，Get_test 前要加上 function
$object = new test();
$data = $object->Get_test(21223);

/*

1092939128@qq.com

yan5201314
*/


?>