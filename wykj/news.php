<?php
require "../common/db.php";
//mysql测试
$db=db::getIntance();

$con = @mysql_connect("localhost","root","root");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

// NewsType 1 企业动态 2行业新闻  3氧气知识
// catid   5企业动态 6 行业新闻   7氧气知识
//newsCode 旧的html地址
/*$NewsType = 3;
$newcatid = 7;*/
$typearray = array('1'=>5,'2'=>6,'3'=>7);

$sql="select Title,NewsCode,NewsType,Keywords,Remark,ImgUrl,Author,BodyContent,CreateDate,ModifyDate from site_newsinfo";
$list=$db->getAll($sql);
echo count($list);
die;
mysql_select_db("phpcmsv9", $con);
$i= 1;
foreach ($list as $key => $v) {
	$ImgUrl = str_replace("/upload/image/","/uploadfile/image/",$v['ImgUrl']);
	$BodyContent = str_replace("/upload/内容页面/新闻/image/","/uploadfile/news/",$v['BodyContent']);
	$CreateDate = strtotime($v['CreateDate']);
	$Title = $v['Title'];
	$Keywords = $v['Keywords'];
	$Remark = $v['Remark'];
	$ModifyDate = $v['ModifyDate'];
	$newsCode = $v['NewsCode'];
	$newcatid = $typearray[$v['NewsType']];
	$insert_sql1 = "INSERT INTO v9_news (id,catid,typeid,title,thumb,keywords,description,status,sysadd,username,inputtime,updatetime) values(${i},${newcatid},0,'{$Title}','${ImgUrl}','{$Keywords}','{$Remark}',99,1,'phpcms','${CreateDate}','${ModifyDate}')";
	$insert1_res = mysql_query($insert_sql1);
	$insert_id = mysql_insert_id();
	if(!empty($insert_id)){
		$update_sql = "UPDATE v9_news set url='/index.php?m=content&c=index&a=show&catid={$newcatid}&id={$insert_id}' where id='${insert_id}'";

		$BodyContent = addslashes($BodyContent);
		$insert_sql2 = "INSERT INTO v9_news_data (id,content,paginationtype,maxcharperpage,copyfrom)values(${insert_id},'".$BodyContent."',0,10000,'|1')";
		$update_res = mysql_query($update_sql);

		$insert_res2 = mysql_query($insert_sql2);

		$insert_seo = $db->query("INSERT INTO seo (type,oldurl,newurl)values('news','/news/detail/{$newsCode}.html','/news/detail/{$insert_id}.html') ");

		if($update_res && $insert_res2){
			echo $Title."===".$insert_id."<br>";
		}else{
			echo $Title."失败".$insert_id."<br>";
			die;
		}

	}
	$i++;
}


mysql_close($con);


?>