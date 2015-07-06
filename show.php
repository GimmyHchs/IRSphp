<?php
// 資料庫相關資料
$database_link = "staff";
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
		//$c=選擇開放作答的ID(第一筆)筆

		
		
		
		
		$dd="select max(answer_id) from answer";
		$ee=mysql_query($dd,$link)or die(mysql_close ($link));
		$ff= mysql_result($ee,0);
		//echo $ff;
		//$hh透過$ff找尋topicn
		
		
		
		$aa="SELECT TopicNo from  answer  where answer_id=$ff";
		$gg=mysql_query($aa,$link)or die(mysql_close ($link));
		$hh= mysql_result($gg,0);
		//echo $hh;
		
		$d="select max(id) from staff";
		$e=mysql_query($d,$link)or die(mysql_close ($link));
		$f= mysql_result($e,0);
		
		
		
		
		$a = "select 	answer		from answer  where answer='$answer'&&TopicNo=$hh";
		$b= mysql_query($a, $link) or die(mysql_error());
		
		$c = mysql_num_rows($b);
		echo $f-$c;
	 ?>
	