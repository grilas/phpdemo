<?php
define('DEMOURL', "http://g.php.com");
//创建目录
function mk_dirs($dir,$mod=0777){
	if(is_dir($dir)) return true;
	return mkdir($dir,$mod,true);
}

?>