<?php

// 資料庫相關資料
$database_dblink = "staff";
$username_dblink = "staff";
$password_dblink = "0935820227";


// 建立資料庫連線
$dblink = mysql_pconnect("localhost", $username_dblink, $password_dblink) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES utf8",$dblink);
mysql_query("SET CHARACTER_SET_CLIENT=utf8",$dblink);
mysql_query("SET CHARACTER_SET_RESULTS=utf8",$dblink);
mysql_select_db($database_dblink, $dblink);


// 宣告utf-8的編碼
header("Content-Type:text/html; charset=utf-8");
// 接收POST/GET的資料

		$query_rs = "SELECT * FROM `staff`";
		$rs = mysql_query($query_rs, $dblink) or die(mysql_error());
		//$row = mysql_fetch_assoc($rs);
		//$row_count = mysql_num_rows($rs);
		//echo $row['name'];
		
		while($r = mysql_fetch_assoc($rs))
		{
			$output[] = $r;
		}
		
		echo(json_encode($output));

?>