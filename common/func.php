<?php
define('DEMOURL', "http://g.git.com");
//域名访问的根目录
$current_dir = dirname(dirname(__FILE__));
$current_dir = str_replace('\\',"/",$current_dir);
define('MY_PATH',$current_dir);



/**
 * 将数组写入文件
 * @param $file string 文件名
 * @param mod 权限
 * @return bool
*/
function array_wirte_file($file,$data){
    $return_data = array("error"=>1,"msg"=>'ok');
    if(!file_exists($file)){
        $return_data['msg'] = "文件不存在";
    }
    if (is_writable($file) == false) {
        $return_data['msg'] = "检查文件是否可写！";
    }
    $return = var_export($data, TRUE);
    if (file_put_contents($file, "<?php \r\n return " . $return . ";")) {
        $return_data['error'] = 0;
    }else{
        $return_data['msg'] = "写入文件失败";
    }
    return $return_data;
}


/**
 * 创建多级目录
 * @param dir string 目录名
 * @param mod 权限
 * @return bool
*/
function mk_dirs($dir,$mod=0777){
	if(is_dir($dir)) return true;
	return mkdir($dir,$mod,true);
}


//curlget
function curlGet($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $output = curl_exec($ch);
    if($error=curl_error($ch)){
        die($error);
    }
    curl_close($ch);
    return $output;
}

//curlpost
/*
    data  数组 然后转成json_decode
*/
function curl_post($url, $data=array(), $header=array(), $timeout=30){ 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); // 从证书中检查SSL加密算法是否存在 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
    curl_setopt($ch, CURLOPT_POST, true); 
    //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 
    $response = curl_exec($ch); 
    if($error=curl_error($ch)){ 
    die($error); 
    } 
    curl_close($ch); 
    return $response; 
} 

/**
 * post 发送 xml string
 * @param url string 发送地址
 * @param data string 发送xml
 * @return bool
*/
function curl_post_xml($url,$data){
	$ch = curl_init();
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$response = curl_exec($ch);
	if($error=curl_error($ch)){ 
    	die($error); 
    } 
    curl_close($ch); 
    return $response; 
}


/**
 * 将xml转换为数组
 * @param string $xml:xml文件或字符串
 * @return array
 */
function xmlToArray($xml){
    //考虑到xml文档中可能会包含<![CDATA[]]>标签，第三个参数设置为LIBXML_NOCDATA
    if (file_exists($xml)) {
        libxml_disable_entity_loader(false);
        $xml_string = simplexml_load_file($xml,'SimpleXMLElement', LIBXML_NOCDATA);
    }else{
        libxml_disable_entity_loader(true);
        $xml_string = simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
    }
    $result = json_decode(json_encode($xml_string),true);
    return $result;
}


/** 
 * 将数组转换为xml 
 * @param array $arr:数组 
 * @param object $dom:Document对象，默认null即可 
 * @param object $node:节点对象，默认null即可 
 * @param string $root:根节点名称 
 * @param string $cdata:是否加入CDATA标签，默认为false 
 * @return string 
 */  
function arrayToXml($arr,$dom=null,$node=null,$root='xml',$cdata=false){  
    if (!$dom){  
        $dom = new DOMDocument('1.0','utf-8');  
    }  
    if(!$node){  
        $node = $dom->createElement($root);  
        $dom->appendChild($node);  
    }  
    $i = 0;
    foreach ($arr as $key=>$value){  
        $child_node = $dom->createElement(is_string($key) ? $key : 'node');  
        $node->appendChild($child_node);  
        //echo $key."------------------------------------<br>";
        if (!is_array($value)){  
            if (!$cdata) {  
                $data = $dom->createTextNode($value);  
            }else{  
                $data = $dom->createCDATASection($value);  
            }  
            $child_node->appendChild($data);  
        }else {
            //echo $key."==<br>";
            arrayToXml($value,$dom,$child_node,$root,$cdata);  
            $i++;
        }  
    }  
    return $dom->saveXML();  
}


?>