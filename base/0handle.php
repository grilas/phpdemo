<?php

/*
**** @author  gll
**** 2018-09-05
**** 去掉数字多余的0
*/

$num = "001.988889900000";
//去掉多余的0
$num1 = floatval($num);
echo "({$num}) 只去掉多余0 =》".$num1;
echo "<br>";

//保留2位小数，不四舍五入
$res_num = floor($num1*100)/100;
echo "({$num}) 保留2位小数，不四舍五入 =》".$res_num;
echo "<br>";

//保留3位小数，不四舍五入
$res_num2 = floor($num1*1000)/1000;
echo "({$num}) 保留3位小数，不四舍五入 =》".$res_num2;
echo "<br>";


//经常用到取整数的函数  ceil，floor，round，intval 
/*
	http://www.w3school.com.cn/php/func_math_ceil.asp
	ceil()  函数向上舍入为最接近的整数。
	返回不小于 x 的下一个整数，x 如果有小数部分则进一位。ceil() 返回的类型仍然是 float，因为 float 值的范围通常比 integer 要大。
	
*/
echo "<br>向上舍入为最接近的整数<br>";
echo "ceil('111.6')=>".ceil('111.6')."<br>";
echo "ceil(0.60)=>".ceil(0.60)."<br>";
echo "ceil(0.40)=>".ceil(0.40)."<br>";
echo "ceil(5)=>".ceil(5)."<br>";
echo "ceil(5.1)=>".ceil(5.1)."<br>";
echo "ceil(-5.1)=>".ceil(-5.1)."<br>";
echo "ceil(-5.9)=>".ceil(-5.9)."<br>";

/*
	http://www.w3school.com.cn/php/func_math_floor.asp
	floor() 函数向下舍入为最接近的整数
	返回不大于 x 的下一个整数，将 x 的小数部分舍去取整。floor() 返回的类型仍然是 float，因为 float 值的范围通常比 integer 要大
*/
echo "<br>向下舍入为最接近的整数<br>";
echo "floor(0.60)=>".floor(0.60)."<br>";
echo "floor(0.40)=>".floor(0.40)."<br>";
echo "floor(5)=>".floor(5)."<br>";
echo "floor(5.1)=>".floor(5.1)."<br>";
echo "floor(-5.1)=>".floor(-5.1)."<br>";
echo "floor(-5.9)=>".floor(-5.9)."<br>";


/*
	http://www.w3school.com.cn/php/func_math_round.asp
	round(x,prec) 对浮点数进行四舍五入。
	x 可选。规定要舍入的数字。 
	prec 可选。规定小数点后的位数。
	返回将 x 根据指定精度 prec （十进制小数点后数字的数目）进行四舍五入的结果。prec 也可以是负数或零（默认值）。
*/
echo "<br>对浮点数进行四舍五入<br>";
echo "round(0.60)=>".round(0.60)."<br>";
echo "round(0.40)=>".round(0.40)."<br>";
echo "round(5)=>".round(5)."<br>";
echo "round(5.1)=>".round(5.1)."<br>";
echo "round(-5.1)=>".round(-5.1)."<br>";
echo "round(-5.9)=>".round(-5.9)."<br>";

/*
	https://www.w3cschool.cn/php/php-intval.html
	intval — 获取变量的整数值
	int intval ( mixed $var [, int $base = 10 ] )
	通过使用指定的进制 base 转换（默认是十进制），返回变量 var 的 integer 数值。 intval() 不能用于 object，否则会产生 E_NOTICE 错误并返回 1。

	参数	描述
	var	要转换成 integer 的数量值。
	base 转化所使用的进制。
*/

	echo "<br/>数值强制转换："."<br>"; 
	$string="2a"; 
	$string1=intval($string); 
	echo 'intval("2a")的值：'.$string1."<br>"; 
	$string2=(int)($string); 
	echo '(int)("2a")的值：'.$string2 ;
	echo "<br>";
	echo "<br>获取变量的整数值<br>";
	echo "intval(42.8)=>".intval(42.8)."<br>";                      // 42
	echo "intval(42)=>".intval(42)."<br>";                      // 42
	echo "intval(4.2)=>".intval(4.2)."<br>";                     // 4
	echo "intval('42')=>".intval('42')."<br>";                    // 42
	echo "intval(+42)=>".intval('+42')."<br>";                   // 42
	echo "intval(-42)=>".intval('-42')."<br>";                   // -42
	echo "intval(042)=>".intval(042)."<br>";                     // 34
	echo "intval('042')=>".intval('042')."<br>";                   // 42
	echo "intval(1e10)=>".intval(1e10)."<br>";                    // 1410065408
	echo "intval('1e10')=>".intval('1e10')."<br>";                  // 1
	echo "intval(0x1A)=>".intval(0x1A)."<br>";                    // 26
	echo "intval(42000000)=>".intval(42000000)."<br>";                // 42000000
	echo "intval(420000000000000000000)=>".intval(420000000000000000000)."<br>";   // 0
	echo "intval(420000000000000000000)=>".intval('420000000000000000000')."<br>"; // 32位系统：2147483647  64位系统：9223372036854775807
	echo "intval(42, 8)=>".intval(42, 8)."<br>";                   // 42
	echo "intval('42', 8)=>".intval('42', 8)."<br>";                 // 34
	echo "intval(array())=>".intval(array())."<br>";                 // 0
	echo "intval(array('foo', 'bar'))=>".intval(array('foo', 'bar'))."<br>";     // 1


/*
1、intval & (int) 都不可以转换 Object。

2、转换效率 (int) > intval() > sprintf （intval 是PHP内置的方法，效率相对低）。

3、其他完全相同。

4、输入0123, 0x123 （int）函数也会按八进制和十六进制转换。

*/
echo "<br>";
echo "1、intval & (int) 都不可以转换 Object<br>2、转换效率 (int) > intval() > sprintf （intval 是PHP内置的方法，效率相对低）。<br>3、其他完全相同。<br>4、输入0123, 0x123 （int）函数也会按八进制和十六进制转换。";
echo "<br>";
$n="19.99";
$example = array(
    19, '19', 19.99, '19.99','', 'abc123','123abc', 0x20, '0x20', array('19.99'), '+41', '-41',
    '10000000000000000000000000000000', (float)1999, null, $n*100, strval($n*100), 'j18ugj9hu0gj5hg',0123

);

foreach ($example as $key => $value){
    echo 'The Transform Value Is: ' . gettype($value) . '  ' . json_encode($value) . "<br>";
    echo "intval is :" , intval($value) . "<br>";
    echo "(int) is :" , (int)($value) . "<br>";
    echo "--------------------------------" . "<br>";
}
?>