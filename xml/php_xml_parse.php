<?php
$doc=new DOMDocument();

//如果是解析xml字符串则使用loadXML
$doc->load('php_print.xml');

//取得根节点
$root=$doc->documentElement;

//通过标记的名字取得对应的元素
$items=$root->getElementsByTagName('Item');

foreach($items as $key=>$val){
	// echo count($val->attributes);
	//id是第一个属性所以使用item(0),nodeValue用来取得节点的值
	echo $val->attributes->item(0)->name.":".$val->attributes->item(0)->nodeValue."  ";

	foreach($val->getElementsByTagName('name') as $key2=>$val2){
		echo $val2->nodeValue."  ";
	}
	foreach($val->getElementsByTagName('num') as $key3=>$val4){
		echo $val4->nodeValue."</br>";
	}
}

?>