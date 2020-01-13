<?php
//echo '<script>document.body.innerHTML="";</script>'; //输出之前清空之前输出的内容
/*header("Content-type:text/html;charset=utf-8");
set_time_limit(0);
echo str_repeat(" ",1024);
ob_start();
for($i=0;$i<10;$i++)
{
echo $i."<br>";
ob_flush();
flush();
sleep(1);
}*/
//echo '<script>window.scrollTo(0,document.body.scrollHeight);</script>';//输出后滚动条自动到最底部


ob_end_flush();//关闭缓存   
set_time_limit(0);   
for($i=0;$i<10;$i++){   
	echo str_repeat(" ",256); //ie下 需要先发送256个字节  
	echo "Now Index is :". $i."<br>";   
	flush();   
	sleep(1);   
}  