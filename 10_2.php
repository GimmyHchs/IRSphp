1<?php

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
//老師端補點名
	if ((isset($_POST["name"])))
	{
	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	 
	 
	
		
	
	
	$e="UPDATE staff  SET authority='0' where name='$name'";
	$f=mysql_query($e,$link);
	
		
	
	
	$query_rs = "SELECT IMEI FROM `staff` where name='$name'";
		$rs = mysql_query($query_rs, $dblink) or die(mysql_error());
		$row = mysql_fetch_assoc($rs);
		$row_count = mysql_num_rows($rs);
		echo $row['IMEI'];
	
	}
	
	?>
 <body>
	<form  action=""  method="POST">
	<p>
     <input type="text" name="name"  />
            
</p>
	<p>&nbsp;</p>

  <p>
    <input name="btn" type="submit"  id="btn" />