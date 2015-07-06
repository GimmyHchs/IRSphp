<?php 
	
	//第二個存入data2的資料庫

	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	$sql = "insert into answer (TopicNo,StartTime) values('23','1')" or die("insert error");
	mysql_query($sql,$link);
?>


