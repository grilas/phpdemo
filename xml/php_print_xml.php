<?php
header("Content-type: text/xml;charset=utf-8");
/*$xml_str_one = "";
$xml_str_one.= "<?xml version='1.0' encoding='UTF-8'?>";
$xml_str_one.= "<users>";
	$xml_str_one.= "<user>";
	$xml_str_one.= "<name>";
	$xml_str_one.= "小小菜鸟";
	$xml_str_one.= "</name>";
	$xml_str_one.= "<age>";
	$xml_str_one.= "24";
	$xml_str_one.= "</age>";
	$xml_str_one.= "<sex>";
	$xml_str_one.= "男";
	$xml_str_one.= "</sex>";
	$xml_str_one.= "</user>";

	$xml_str_one.= "<user>";
	$xml_str_one.= "<name>";
	$xml_str_one.= "艳艳";
	$xml_str_one.= "</name>";
	$xml_str_one.= "<age>";
	$xml_str_one.= "23";
	$xml_str_one.= "</age>";
	$xml_str_one.= "<sex>";
	$xml_str_one.= "女";
	$xml_str_one.= "</sex>";
	$xml_str_one.= "</user>";
$xml_str_one.= "</users>";*/

//==============================================
$xml_str_two = "";
$doc=new DOMDocument('1.0','utf-8');
//创建根节点
$root=$doc->createElement("StudentInfo");
//创建第一个子节点
$item=$doc->createElement("Item");
$name=$doc->createElement("name","蔡依林");
$studentnum=$doc->createElement("num","2009010502");
//创建属性（phpdom可以把任何元素当做子节点）
$id=$doc->createAttribute("id");
$value=$doc->createTextNode('1');
$id->appendChild($value);
//在父节点下面加入子节点
$item->appendChild($name);
$item->appendChild($studentnum);
$item->appendChild($id);


$item2=$doc->createElement("Item");
$name2=$doc->createElement("name","潘玮柏");
$studentnum2=$doc->createElement("num","2009010505");
$id2=$doc->createAttribute("id");
$value2=$doc->createTextNode('2');
$id2->appendChild($value2);
$item2->appendChild($name2);
$item2->appendChild($studentnum2);
$item2->appendChild($id2);


$root->appendChild($item);
$root->appendChild($item2);

//把根节点挂载在DOMDocument对象
$doc->appendChild($root);

//在页面上输出xml
$xml_str_two = $doc->saveXML();
echo $xml_str_two;
//将xml保存成文件
$doc->save("php_print.xml");

?>