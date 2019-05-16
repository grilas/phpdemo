<?php
$con = @mysql_connect("localhost","root","root");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("phpcmsv9", $con);


$select = "SELECT id,catid from v9_case";
//案例13
$res = @mysql_query($select);
while ($arr = @mysql_fetch_assoc($res)) {
	$insert = "INSERT INTO v9_hits(hitsid,catid) values('c-13-{$arr[id]}','{$arr[catid]}')";
	//@mysql_query($insert);
	echo $arr['id']."<br>";
}

/*	*/



