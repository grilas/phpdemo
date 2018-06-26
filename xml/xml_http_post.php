<?php
$file_in = file_get_contents("php://input"); //接收post数据

$xml = simplexml_load_string($file_in);//转换post数据为simplexml对象

$str ="";
foreach($xml->children() as $child)    //遍历所有节点数据
{
	$str .= "to:".($child->to)."  from:".($child->from)." heading:".($child->heading)."<br>";
	
}

echo $str;
exit;

?>