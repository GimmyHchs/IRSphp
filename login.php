<?php
// 資料庫相關資料
$database_link = "admin";
$username_link = "staff";
$password_link = "0935820227";
// 建立資料庫連線
$link = mysql_pconnect("localhost", $username_link, $password_link) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES utf8",$link);
mysql_query("SET CHARACTER_SET_CLIENT=utf8",$link);
mysql_query("SET CHARACTER_SET_RESULTS=utf8",$link);
mysql_select_db($database_link, $link);
// 宣告utf-8的編碼t
header("Content-Type:text/html; charset=utf-8");
// 接收POST/GET的資料

		//$c=選擇開放作答的ID(第一筆)
		
			$sql = "SELECT * FROM teachermem WHERE memid='$memid'&&mempwd='$mempwd'";
			$rows = @mysql_num_rows(mysql_query($sql));
			if ($rows) echo "符合";
			else echo "不符合";
			
			//$row = mysql_fetch_assoc($rs);
		//$row_count = mysql_num_rows($rs);
		//echo $row['name'];
			
			
			
			
			
			//$query_rs = "SELECT * FROM `teachermem`";
		//$rs = mysql_query($query_rs, $link) or die(mysql_error());
		
		
		//while($r = mysql_fetch_assoc($rs))
		//{
		//	$output[] = $r;
		//}
		//echo(json_encode($output));