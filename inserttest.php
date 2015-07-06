<?php

	$link = mysql_pconnect("localhost", "staff", "0935820227");
	mysql_select_db("staff",$link) or die("無法選擇資料庫");
	mysql_query("SET NAMES 'utf8'");
	$d="select max(id) from staff";
	$e=mysql_query($d,$link);
	$f=mysql_result($e,0);
	echo $f;
?>