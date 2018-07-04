<?php
/*
	查找字符串
*/

$str = "abcdEguoluluEmy";

/*
strstr--查找字符串首次出现 区分大小写
	strstr ( string $haystack , mixed $needle [, bool $before_needle = false ] ) 
stristr() 不区分大小写；
*/
echo "str:{$str} 查找E字符<br><br>";

echo strstr($str, 'E')."<br>"; //EguoluluEmy

//从php 5.3 起 返回之前东西
echo strstr($str, 'E',true)."<br>"; //abc

echo stristr($str, 'e')."<br>";//EguoluluEmy

/*
	strpos--查找字符串首次出现位置	小标从0开始
	strrpos--查找字符串最后一次出现位置
*/

echo strpos($str, "E")."<br>"; //4  stripos 不区分大小写
//如果没找到，就返回false

echo strrpos($str,"E")."<br>";//12  strripos 不区分大小写

/*
	strrchr 查找指定字符在字符串中的最后一次出现
*/
echo strrchr($str, "E")."<br>"; //Emy
echo "<hr>";

$str = 'sailrancho@qq.com';
echo strstr($str,'qq.'); // 返回 qq.com
echo "\n";
echo strrchr($str, 'ch'); // 返回 com 注意返回不是cho@qq.com
echo "\n";
echo strpos($str, 'c'); //返回 7 
echo "\n";
echo strrpos($str, 'c'); // 返回14
echo "<hr>";
$str = "这四个函数是字符操作函数,主要是判断字符出现的次数,有需要的朋友可以参考一下";
$res = strrchr($str,'主要');
echo $res;
echo "<br />";
$urlcode1 = urlencode("主");
$urlcode2 = urlencode("一");
echo "主的urlencode:".$urlcode1;
echo "<br />";
echo "一的urlencode:".$urlcode2;
echo "<br />";

echo "下的urlencode:".urlencode("下");
?>