<?php

/*
**** 方法一： is_dir(目录名) 返回值 true false
**** 1): 第一个if=>用is_dir判断是否是存在这个目录，已存在，返回true 不用创建目录；如果不存在，则试着创建，如果有多级目录，mkdir就创建不成功，加上@禁止不必要的非致命错误。
**** 2): 第二个if=》第一个if都不满足，用dirname 取得父级目录，当然有可能是不存在的多级父级，所以用了mk_dir()来先创建父级，如果成功（不成功返回FALSE），那么再用mkdir来创建最终的目录了。
a/b/c/d
a/b/c
做递归的时候用到栈。先进后出

注意: mode 在 Windows 下被忽略
*/

//转正斜杠 // __FILE__ 当前文件绝对路径  dirname 父级目录
$current_dir = dirname(__FILE__);
$current_dir = str_replace('\\',"/",$current_dir);
$mulu = $current_dir."/data/a/b/c/d";
//或者当前文件夹   $mulu = "1/2/3/4";
//$create_res = mk_dir($mulu);
$create_res = 0;
if($create_res){
	echo "创建成功";
}
function mk_dir($dir,$mod=0777){
	//查找是否存在这个目录，或者试着创建这个目录，如果成功返回true /a
	if(is_dir($dir) || @mkdir($dir,$mod)) return true;
	//试图创建父目录，期间如果没有创建父目录成功，放入栈中，等待创建
	//期间放入栈中的数据 1 /a/b/c/d 2 /a/b/c 3 /a/b 
	if(!mk_dir(dirname($dir))) return false;
	//放入栈中的数据，先进后出 3,2,1
	return @mkdir($dir,$mod);
}


/*
**** 第二种 精简
********  大致流程： 得到路径后，先判断是否已是一个有效的文件目录，如是则返回，结束程序。
********  如果不是，（由于这里用了OR作先择性的条件，即只要满足其中一个条件就行），则递归再调用自身，并且传入的路径中，少一级目录。
********  这样来先回到上级有的父级目录中，再用mkdir来创建下一级的。
*/
function create_folders($dir,$mod=0777) {
    return is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir, $mod));
}



/*
***** 第三种 递归创建级联目录
*/

function Directory($dir,$mod=0777){
if(is_dir($dir) || @mkdir($dir,$mod)){ //查看目录是否已经存在或尝试创建，加一个@抑制符号是因为第一次创建失败，会报一个“父目录不存在”的警告。
	echo $dir."创建成功=====<br>";  //输出创建成功的目录
	}else{
		$dirArr=explode('/',$dir); //当子目录没创建成功时，试图创建父目录，用explode()函数以'/'分隔符切割成一个数组
		array_pop($dirArr); //将数组中的最后一项（即子目录）弹出来，
		$newDir=implode('/',$dirArr); //重新组合成一个文件夹字符串
		Directory($newDir); //试图创建父目录
		if(@mkdir($dir,$mod)){
			echo $dir."创建成功-----<br>";
		} //再次试图创建子目录,成功输出目录名
	}
} 
//Directory("A/B/C/D/E/F");



/*
***  第四种 使用函数创建 php5 支持
*** bool mkdir ( string pathname [, int mode [, bool recursive [, resource context]]] )
*/

$dir_url = "a1/a2/a3";
//$res = mk_dirs($dir_url);
function mk_dirs($dir,$mod=0777){
	if(is_dir($dir)) return true;
	return mkdir($dir,$mod,true);
}


?>

