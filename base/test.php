<?php



echo strtotime("+ 35 minute");
die;
echo 2100%1000;
die;
/*$now = strtotime("+ 35 minute");
        echo $now; die;
//往前补零

$bu_num = 10;

$var=sprintf("%03d", $bu_num);
echo $var;
die;

$num = 1000;

echo ceil((100-200)/24);
die;*/

/*
1 	0x11  空气净化   				
2 	0x21  制氧
3 	0x31  空气净化+制氧
4 	0x41  负离子
5 	0x51  空气净化+负离子
6 	0x61  制氧+负离子 
7 	0x71  空气净化+制氧+负离子

*/
$onstart =1;
$old_pattern_hex = hexdec("0x31");
$pattern = 4;
$g_pattern =  hexdec("0x".$pattern.$onstart);
$pattern_order = ($old_pattern_hex | $g_pattern);
//echo $pattern_order;

echo (113 & 177);

//echo hexdec('0xB1');
/*
17=>11
33=>21
49=>31
113=>71
81=>51
65=>41
97=>61
*/
die;
echo dechex(73);

echo hexdec((17 | 33));
echo "<br>";
echo "<br>";

//启动 某个模式
$old = hexdec("0x31");
$new = hexdec("0x41");
$aa = dechex(($old | $new));
var_dump($aa);
echo "<br>";

//关闭某个模式 d1 制氧 e1 空气净化 91 负离子
$old = hexdec("0x71");
$new = hexdec("0xE1");
$aa = dechex(($old & $new));

var_dump($aa);



/*$patter_msg[1] = '1';
$patter_msg[2] = '2';
$patter_msg[3] = '1,2';
$patter_msg[4] = '4';
$patter_msg[5] = '1,4';
$patter_msg[6] = '2,4';
$patter_msg[7] = '1,2,4';

$patter_num['1'] = '1';
$patter_num['2'] = '2';
$patter_num['12'] = '3';
$patter_num['4'] = '4';
$patter_num['14'] = '5';
$patter_num['24'] = '6';
$patter_num['124'] = '7';

$old = 6; 
echo "old_pattern_msg=>".$patter_msg[$old]."<br>";
$old_patter_arr = explode(",", $patter_msg[$old]);

$new = 1;
echo "new_pattern_msg=>".$patter_msg[$new]."<br>";
$new_patter_arr = explode(",", $patter_msg[$new]);

$add_patter = array_unique(array_merge($old_patter_arr,$new_patter_arr));
sort($add_patter);
print_r($add_patter);
echo "<br>";
$num_key = implode("", $add_patter);
echo $patter_num[$num_key];*/




/*$num16 = 0x61;

if(($num16 & 0x01) == 0x01){
	//开机
	echo "开机".($num16 & 0x01)."<br>";

	$patten = "";
	if(($num16 & 0x10) == 0x10){
		//模式一
		$patten .= "1";
		echo "空气净化模式---".($num16 & 0x10)."<br>";
	}
	if(($num16 & 0x20) == 0x20){
		$patten .= "2";
		echo "制氧模式---".($num16 & 0x20)."<br>";
	}
	if(($num16 & 0x40) == 0x40){
		$patten .= "3";
		echo "负离子模式--".($num16 & 0x40)."<br>";
	}

	if($patten == "12"){
		//空气净化+制氧
		$patten = 3;
	}elseif($patten == "13"){
		//0x51  负离子 + 空气净化
		$patten = 5;
	}elseif($patten == "23"){
		//0x61  负离子 + 制氧
		$patten = 6;
	}elseif($patten == "123"){
		//0x71  空气净化   + 制氧 + 负离子
		$patten = 7;
	}
	//echo strlen($patten)."<br>";
	echo "最终==".$patten;
}else{
	//关机
	echo "关机".($num16 & 0x01)."<br>";
}*/



/*

0x11 => 模式1-> 状态1  空气净化
0x21 => 模式2-> 状态1  制氧模式
0x41 => 模式3-> 状态1  负离子

0x10 => 模式1-> 状态0
0x20 => 模式2-> 状态0
0x40 => 模式3-> 状态0

1 	0x11  空气净化  
2 	0x21  制氧
3 	0x31  空气净化 + 制氧
4 	0x41  负离子
5 	0x51  负离子 + 空气净化
6 	0x61  负离子 + 制氧
7 	0x71  空气净化   + 制氧 + 负离子

$patter_arr[1][3][4] = 7;
$patter_arr[1][5][2] = 7;


开机-----------------
当前模式  	0x11  空气净化  
启动 		0x21  制氧
------命令会变成 0x31  空气净化 + 制氧



当前模式  	0x11  空气净化  
启动 		0x21  制氧
------命令会变成 0x31  空气净化 + 制氧




当前模式  0x31  空气净化 + 制氧
启动 0x41  负离子
------命令会变成 3  

当前模式  0x51  负离子 + 空气净化
启动 0x21  制氧
------命令会变成 7






$num16 = 0x61;

echo "============".$num16."<br>";

echo "------------".hexdec("0x61")."<br>";

*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>sdsd</title>
	<meta charset="utf-8">
</head>
<body>
<script type="text/javascript">

	var aa = parseInt("0x61",16);
	var cc = "str1".replace(/[^\d]/g,'');
	console.log(cc);
</script>
</body>
</html>