<?php
define('DEMOURL', "http://g.git.com");
//域名访问的根目录
$current_dir = dirname(dirname(__FILE__));
$current_dir = str_replace('\\',"/",$current_dir);
define('MY_PATH',$current_dir);


/**
 * utf8编码字符串截取无乱码
 * @param $str string 要处理的字符串
 * @param $start int 从哪个位置开始截取
 * @param $length int 要截取字符的个数
 * @return string 截取后得到的字符串
*/
function substr_utf8($str,$start,$length = null)
{
    $sep = "";
    $arr = array_slice(preg_split("//u", $str,-1,PREG_SPLIT_NO_EMPTY), $start,$length);
    return join($sep,$arr);
}


/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name)
{
    $result = false;
    if (is_dir($dir_name)) {
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}


/**
 * 判断是否为手机访问
 * @return  boolean
 */
function is_mobile()
{
    static $is_mobile;

    if (isset($is_mobile)) {
        return $is_mobile;
    }

    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false
    ) {
        $is_mobile = true;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}


 /**
 * 检查是否是手机端
 * 
 */
function ispc() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;

    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
        'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
    // 如果只支持wml并且不支持html那一定是移动设备
    // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}

 /**
 * 返回加密后的密码字符串
 * @param unknown_type $password
 */
function getPwdEncodeString($password){
    return md5(md5($password).substr($password,0,3));
}


/**
 * 生成json中文显示方法
 * @param json_string
 * @return string
*/
function decodeUnicode($str){
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
    create_function(
      '$matches',
      'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
    ),
    $str);
}


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