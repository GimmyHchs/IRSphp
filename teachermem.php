<?php
// 資料庫相關資料
if ((isset($_POST["memid"])))
	{
$database_link = "admin";
$username_link = "staff";
$password_link = "0935820227";
// 建立資料庫連線
$link = mysql_pconnect("localhost", $username_link, $password_link) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES utf8",$link);
mysql_query("SET CHARACTER_SET_CLIENT=utf8",$link);
mysql_query("SET CHARACTER_SET_RESULTS=utf8",$link);
mysql_select_db($database_link, $link);
// 宣告utf-8的編碼
header("Content-Type:text/html; charset=utf-8");
// 接收POST/GET的資料
	//老師註冊帳密 有否重複
	date_default_timezone_set('Asia/Taipei');   
	$date_time = date("Y-m-d H:i:s");
	$a = "SELECT * FROM teachermem WHERE memid='$memid'";
	$b = @mysql_num_rows(mysql_query($a));
	//echo $rows;
	
	if ($b)
	{
	echo "帳號有重複";
	}else
	
	{
	 $sql = "insert into  teachermem (memid,mempwd,memname,mememail,memtime) values('$memid','$mempwd','$memname','$mememail','$date_time')" or die("insert error");
	 mysql_query($sql,$link);
	
	}
	}
	 ?>