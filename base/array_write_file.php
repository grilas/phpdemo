<?php
// 数组写入文件, 通常用户配置文件
include "../common/func.php";
/*
var_export() 函数返回关于传递给该函数的变量的结构信息，它和 var_dump() 类似，不同的是其返回的表示是合法的 PHP 代码。var_export必须返回合法的php代码， 也就是说，var_export返回的代码，可以直接当作php代码赋值个一个变量。 而这个变量就会取得和被var_export一样的类型的值
*/


$data = array(
	0=>array('name' => "大妞", "age"=>"17", "sex" => "女" ),
	1=>array('name' => "小妞", "age"=>"18", "sex" => "女" ),
	2=>array('name' => "妞妞", "age"=>"19", "sex" => "女" ),
);


$filename = "../data/array_write_file_1.php";
file_exists($filename) or touch($filename);

$res = array_wirte_file($filename,$data);
if($res['error'] == 0){
	echo "<a href='".DEMOURL."/base/{$filename}'>已经生成{$filename}</a>";
}else{
	echo $res['msg'];
}

?>