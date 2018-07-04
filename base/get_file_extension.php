<?php
/*
	获取文件名称 和 扩展名
	
	获取扩展名 ：字符串截取2种，数组分隔3种，路径函数2种

*/

$path = "./get_file_extension.php";

echo "文件路径: ".$path."<br><br>";

/*
	字符串截取一
 	strrchr 查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符。
*/
echo '字符串截取1、echo substr(strrchr($path, "."),1)'."<br>"; 	
echo "输出：".substr(strrchr($path, "."),1);
echo "<br><br>";


/*
	字符串截取二
	strpos 查找字符串第一次出现位置
	strrpos 查找字符串最后一次出现位置
*/
echo '字符串截取2、echo substr($path, strrpos($path, ".")+1)'."<br>"; 
echo "输出：".substr($path, strrpos($path, ".")+1);
echo "<br><br>";


/*
	数组分隔1、
*/
echo '数组分隔1、 $arr = explode(".", $path); echo $arr[count($arr)-1];'."<br>";

$arr = explode(".", $path);
echo "输出：".$arr[count($arr)-1];

echo "<br><br>";

/*
	数组分隔2、
*/
echo '数组分隔2、 $arr = explode(".", $path); echo end($arr);'."<br>";

$arr = explode(".", $path);
echo "输出：".end($arr);
echo "<br><br>";


/*
	数组分隔3、
	strrev 字符串翻转
*/
echo '数组分隔3、 echo "输出：".strrev(explode(".", strrev($path))[0]);'."<br>";

echo "输出：".strrev(explode(".", strrev($path))[0]);
echo "<br><br>";

/*
	路径函数1、
*/
echo '路径函数：pathinfo($path)["extension"];pathinfo($path,PATHINFO_EXTENSION); '."<br>";	

echo pathinfo($path)["extension"]."<br>";

echo pathinfo($path,PATHINFO_EXTENSION)."<br>";


echo "<br><br>";

/*
basename(path,suffix) 函数返回路径中的文件名部分。
//显示带有文件扩展名的文件名
echo basename($path);  //get_file_extension.php

//显示不带有文件扩展名的文件名,suffix忽略扩展名
echo basename($path,".php");  //get_file_extension
*/
//返回文件名称
$file_name =  basename($path,'.php');
echo "文件名称:".$file_name."<br><hr>";


/*
	pathinfo(path,options)
	函数以数组的形式返回关于文件路径的信息。
	options
		可选。规定要返回的数组元素。默认是 all。
		可能的值：
		PATHINFO_DIRNAME - 只返回 dirname
		PATHINFO_BASENAME - 只返回 basename
		PATHINFO_EXTENSION - 只返回 extension
	Array
	(
	    [dirname] => .
	    [basename] => get_file_extension.php
	    [extension] => php
	    [filename] => get_file_extension
	)

*/

$pathinfo = pathinfo($path);
echo "目录名称：$pathinfo[dirname]<br>";
echo "文件名称：$pathinfo[basename]<br>";
echo "扩展名：$pathinfo[extension]<br><hr>";

//返回规范化的绝对路径名
$realpath = realpath($path);
echo "返回文件绝对路径：".$realpath."<br><hr>";
//D:\www\github\phpdemo\base\get_file_extension.php


?>