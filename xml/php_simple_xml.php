<?php
include "../common/func.php";
/*$xml=simplexml_load_file("1.xml");

//第一组数据
//$root_node = $xml->note[0];
//var_dump($xml);
//echo $num = count($xml);

foreach($xml->children() as $key=> $child)
{
	//var_dump($child);
	echo $child->getName()."<br>";//结点名称
	//节点内容
    echo "====to:".($child->to)."<br>";
    echo "====from:".($child->from)."<br>";
    echo "====content:".($child->content)."<br>";
}*/

echo "<hr>";
$data = xmlToArray("1.xml");
echo "<pre>";
print_r($data);


echo "<hr>";
$xml_str = arrayToXml($data,null,null,"letter");

echo $xml_str;

?>