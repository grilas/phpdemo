<?php

/*
   https://pan.baidu.com/s/1dnSFbhCsjbtPhXQuCTQWIA
*/

//$jsonStr = '{"key":"value","key1":"value1"}';
/*$jsonStr = '{"name":"2018-08-06","image":"http://www.youcaiwx.com/Public/Uploads/newtopicpics/2018-08-13/5b7140f00d5d9.jpg"}';
$json2Array = json_decode($jsonStr,true);
var_dump($json2Array);die;*/


$aaa = 001.988889900000;

//去掉多余的0
$bbb = floatval($aaa);

//保留2位小数，不四舍五入
echo $total = floor($bbb*100)/100;



//echo sprintf("%.2f",substr(sprintf("%.3f", $bbb), 0, -2)); 
die;

$arr = array('{"name":"2018-08-06","image":"http://www.youcaiwx.com/Public/Uploads/newtopicpics/2018-08-13/5b7140f00d5d9.jpg"}' ,'{"name":"2018-08-07","image":"http://www.youcaiwx.com/Public/Uploads/newtopicpics/2018-08-13/5b7140f00d5d9.jpg"}');


foreach ($arr as $key => $value) {
    $ar = json_decode($value,true);
    var_dump($ar);
}



$content = "哪些网游是我们在游艺春秋的网站中可以找到？";
$keyword = array("网站","游艺春秋","网游");


$find_num = array();
foreach ($keyword as $key => $value) {
    $find_num[$key]=strpos($content,$value); 
}

//var_dump($find_num);


function find_keyword($content,$keyword){

}



/*$x = 5;
echo $x;
echo "<br>";

echo $x+++$x++;
echo "<br>";

echo $x;
echo "<br>";

echo $x---$x--;
echo "<br>";

echo $x;*/

/*$x = 3+"15%"+"$25";
echo $x;*/

/*
function getDays($date){
    //获取天数
$days=date("t",strtotime($date));return $days;
}
     
//2015 年12 月
$date="2015-12";
echo getDays($date);
//输出结果：31天*/



/*$aa = strtotime("2018-06-12");
echo ucfirst(date("M",$aa));
echo "<br>";

$time = date("Y-m-d");
echo $time."<br>";
echo "月".date('M');*/



//
/*echo "<hr>";
$str = "不乱于心，不困于情。不畏将来，不念过往。如此，安好。";
echo mb_substr($str, 2, 4, 'utf-8');

echo "<hr>";*/


//用php实现一个双向队列


/**
 * utf8编码字符串截取无乱码
 * @param $str string 要处理的字符串
 * @param $start int 从哪个位置开始截取
 * @param $length int 要截取字符的个数
 * @return string 截取后得到的字符串
*/
/*
    /u 表示按unicode(utf-8)匹配（主要针对多字节比如汉字）
    /i 表示不区分大小写（如果表达式里面有 a， 那么 A 也是匹配对象）
    /s 表示将字符串视为单行来匹配
    preg_split() 通过一个正则表达式分隔给定字符串。
    array preg_split ( string $pattern , string $subject [, int $limit = -1 [, int $flags = 0 ]] )

    $pattern: 用于搜索的模式，字符串形式。正则
    $subject: 输入字符串。
    $limit: 可选，如果指定，将限制分隔得到的子串最多只有limit个，返回的最后一个 子串将包含所有剩余部分。
        limit值为-1， 0或null时都代表"不限制"， 作为php的标准，你可以使用null跳过对flags的设置。
    $flags: 可选，可以是任何下面标记的组合(以位或运算 | 组合)：
        PREG_SPLIT_NO_EMPTY: 如果这个标记被设置， preg_split() 将进返回分隔后的非空部分。
        PREG_SPLIT_DELIM_CAPTURE: 如果这个标记设置了，用于分隔的模式中的括号表达式将被捕获并返回。
        PREG_SPLIT_OFFSET_CAPTURE: 如果这个标记被设置, 对于每一个出现的匹配返回时将会附加字符串偏移量. 
    注意：这将会改变返回数组中的每一个元素, 使其每个元素成为一个由第0 个元素为分隔后的子串，第1个元素为该子串在subject 中的偏移量组成的数组。

    array_slice
    array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )
    返回数组中指定下标offset和长度length的子数组切片。
    
    
*/

function substr_utf8($str,$start,$length = null)
{
    $sep = "";
    $arr = array_slice(preg_split("//u", $str,-1,PREG_SPLIT_NO_EMPTY), $start,$length);
    return join($sep,$arr);
}
















