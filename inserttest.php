
<?php
	
	//第二個存入data2的資料庫
	date_default_timezone_set('Asia/Taipei');   
	$date_time = date("Y-m-d H:i:s");

	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	
	$sql = "insert into openanswer (IfOpenanswer,TopicNo,time) values('T','$TopicNo','$date_time')" or die("insert error");
 
	
	
	mysql_query($sql,$link);
	
?>


