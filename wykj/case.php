<?php
require "../common/db.php";
//mysql测试
$db=db::getIntance();

$con = @mysql_connect("localhost","root","root");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

// CaseType 1001 工程 2003 家装
// catid   15 工程 14 家装   
//CaseCode 旧的html地址

$typearray = array('1001'=>15,'2003'=>14);

$sql="select Title,CaseCode,CaseType,Keywords,Remark,ImgUrl,Author,BodyContent,CreateDate,ModifyDate from site_caseinfo";
$list=$db->getAll($sql);

/*echo count($list);
die;*/
mysql_select_db("phpcmsv9", $con);
$i= 1;
foreach ($list as $key => $v) {
	$ImgUrl = str_replace("/upload/内容页面/案例/image/","/uploadfile/case/",$v['ImgUrl']);
	$BodyContent = str_replace("/upload/内容页面/案例/image/","/uploadfile/case/",$v['BodyContent']);
	$CreateDate = strtotime($v['CreateDate']);
	$Title = $v['Title'];
	$Keywords = $v['Keywords'];
	$Remark = $v['Remark'];
	$ModifyDate = strtotime($v['ModifyDate']);
	$CaseCode = $v['CaseCode'];
	$newcatid = $typearray[$v['CaseType']];
	$insert_sql1 = "INSERT INTO v9_case (id,catid,typeid,title,thumb,keywords,description,status,sysadd,username,inputtime,updatetime) values(${i},${newcatid},0,'{$Title}','${ImgUrl}','{$Keywords}','{$Remark}',99,1,'phpcms','${CreateDate}','${ModifyDate}')";
	$insert1_res = mysql_query($insert_sql1);
	$insert_id = mysql_insert_id();
	if(!empty($insert_id)){
		$update_sql = "UPDATE v9_case set url='/index.php?m=content&c=index&a=show&catid={$newcatid}&id={$insert_id}' where id='${insert_id}'";

		$BodyContent = addslashes($BodyContent);
		$insert_sql2 = "INSERT INTO v9_case_data (id,content,paginationtype,maxcharperpage)values(${insert_id},'".$BodyContent."',0,10000)";
		$update_res = mysql_query($update_sql);

		$insert_res2 = mysql_query($insert_sql2);
		/*echo mysql_error();
		var_dump($insert_res2);
		die;*/
		$insert_seo = $db->query("INSERT INTO seo (type,oldurl,newurl)values('case','/case/detail/{$CaseCode}.html','/case/detail/{$insert_id}.html') ");

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