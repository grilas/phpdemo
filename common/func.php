<?php
define('DEMOURL', "http://g.git.com");
//创建目录
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

?>