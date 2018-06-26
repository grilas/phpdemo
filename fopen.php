<?php

/*
**** fopen 简介
fopen() 函数打开一个文件或 URL。
如果 fopen() 失败，它将返回 FALSE 并附带错误信息。您可以通过在函数名前面添加一个 '@' 来隐藏错误输出。
语法
fopen(filename,mode,include_path,context)
http://www.runoob.com/php/func-filesystem-fopen.html

r  只读，并将文件指针指向文件开始位置
r+ 读写，将文件指针指向文件开始位置
w  只写，将文件指针指向文件开始位置并将文件内容清空，如果文件不存在则尝试创建之
w+ 读写，将文件指针指向文件开始位置并将文件内容清空，如果文件不存在则尝试创建之
a  追加，将文件指针指向文件末尾来操作，如果文件不存在则尝试创建之
a+ 读写追加，将文件指针指向文件末尾来操作，如果文件不存在则尝试创建之
x  只写，并创建文件，如果文件已存在，则 fopen() 调用失败并返回 FALSE
x+ 读写，并创建文件，如果文件已存在，则 fopen() 调用失败并返回 FALSE

提示和注释
注释：当书写一个文本文件时，请确保您使用了正确的行结束符！
在 Unix 系统中，行结束符为 \n；在 Windows 系统中，行结束符为 \r\n；
在 Macintosh 系统中，行结束符为 \r。
Windows 系统中提供了一个文本转换标记 "t" ，可以透明地将 \n 转换为 \r\n。您还可以使用 "b" 来强制使用二进制模式，这样就不会转换数据。
为了使用这些标记，请使用 "b" 或者 "t" 来作为 mode 参数的最后一个字符。

$file = fopen("test.txt","r");
$file = fopen("/home/test/test.txt","r");
$file = fopen("/home/test/test.gif","wb");
$file = fopen("http://www.example.com/","r");
$file = fopen("ftp://user:password@example.com/test.txt","w");

*/

$current_dir = dirname(__FILE__);
$current_dir = str_replace('\\',"/",$current_dir);

require "./common/func.php";
$data_dir = $current_dir."/data/fopen";

$dir_res = mk_dirs($data_dir);
if(!$dir_res){ die("目录创建失败");}

$a_url = DEMOURL."/demo/data/fopen";
/*
**** 常用fopen，打开文件并写入
****
*/

$my_file = $data_dir.'/file.txt';
$handle = fopen($my_file, 'w+') or die('Cannot open file: '.$my_file);
$data = 'This is the data';
fwrite($handle, $data);
fclose($handle);
echo "<a href='".$a_url."/file.txt' target='_blank'>file.txt创建成功</a><hr><br>";

/*
案例一： 请写一段PHP代码，确保多个进程同时写入同一个文件成功
*/

$fp = fopen($data_dir."/lock.txt","w+");
if (flock($fp,LOCK_EX)) {
    //获得写锁，写数据
    fwrite($fp, "write something");
    // 解除锁定
    flock($fp, LOCK_UN);
} else {
    echo "file is locking...";
}
fclose($fp);
echo "<a href='".$a_url."/lock.txt' target='_blank'>lock.txt创建成功</a><hr><br>";

/*
案例二： 简单的
*/

?>