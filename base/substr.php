<?php
$str = <<<AA
/*
	<br>
	字符串截取<br>
	substr(string,start,length)函数返回字符串一部分<br>
	http://www.w3school.com.cn/php/func_string_substr.asp
	string 要截取的字符串<br>
	start   正数- 在字符串的指定位置开始<br>
			负数 - 在从字符串结尾开始的指定位置开始<br>
	length  正数 - 从 start 参数所在的位置返回的长度<br>
			负数 - 从字符串末端返回的长度 <br>
*/
AA;
echo $str."<br>";

echo 'echo substr("Hello world",10)'."<br>";
echo substr("Hello world",10)."<br><br>";

echo 'echo substr("Hello world",1)'."<br>";
echo substr("Hello world",1)."<br><br>";

echo 'echo substr("Hello world",3)'."<br>";
echo substr("Hello world",3)."<br><br>";

echo 'echo substr("Hello world",7)'."<br>";
echo substr("Hello world",7)."<br><br>";

echo 'echo substr("Hello world",-1)'."<br>";
echo substr("Hello world",-1)."<br><br>";

echo 'echo substr("Hello world",-10)'."<br>";
echo substr("Hello world",-10)."<br><br>";

echo 'echo substr("Hello world",-8)'."<br>";
echo substr("Hello world",-8)."<br><br>";

echo 'echo substr("Hello world",-4)'."<br>";
echo substr("Hello world",-4)."<br><br>";

echo 'echo substr("Hello world",0,10);'."<br>";
echo substr("Hello world",0,10)."<br><br>";

echo 'echo substr("Hello world",1,8);'."<br>";
echo substr("Hello world",1,8)."<br><br>";

echo 'echo substr("Hello world",0,5);'."<br>";
echo substr("Hello world",0,5)."<br><br>";

echo 'echo substr("Hello world",6,6);'."<br>";
echo substr("Hello world",6,6)."<br><br>";

echo 'echo substr("Hello world",0,-1);'."<br>";
echo substr("Hello world",0,-1)."<br><br>";

echo 'echo substr("Hello world",-10,-2);'."<br>";
echo substr("Hello world",-10,-2)."<br><br>";

echo 'echo substr("Hello world",0,-6);'."<br>";
echo substr("Hello world",0,-6)."<br><br>";

echo 'echo substr("Hello world",-2,-3);'."<br>";
echo substr("Hello world",-2-3)."<br><br>";



?>