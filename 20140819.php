<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form  action=""  method="post">
	<p>題序:
     <input type="text" name="TopicNo/>
            
</p>
	<p>&nbsp;</p>

  <p>
    <input name="btn" type="submit"  id="btn"/>
  
<p>
</body>
<?php
	//echo   	$date_time  記錄時間;
	date_default_timezone_set('Asia/Taipei');   
	$date_time = date("Y-m-d H:i:s");

	//存入staff資料庫
	//老師開放題目
	
	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	
	 $d="select max(id) from staff";
	 $e=mysql_query($d,$link);
	 $f= mysql_result($e,0);
	 echo $f;
	 $A="select min(answer_id) from answer";
	 $B=mysql_query($A,$link);
	 $C= mysql_result($B,0);
	 if($C==0)
	 $C++;
	 for($i=0;$i<$f;$i++){	
	 $sql = "insert into answer (TopicNo,StartTime) values('$TopicNo','$date_time')" or die("insert error");
	 mysql_query($sql,$link);
	 
	 $j="select max(answer_id) from answer";
	 $k=mysql_query($j,$link);
	 $l= mysql_result($k,0);
	 $g="update answer set  IMEI =(select IMEI from staff where id='$C' ) where answer.answer_id='$l'";
	 $h=mysql_query($g,$link);
	 $C++;
	 echo $l;
	 
		}
?>
</p>
<p>
<?php
	
	//第二個存入data2的資料庫
	
	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	
	$sql = "insert into openanswer (IfOpenanswer,TopicNo,time) values('T','$TopicNo','$date_time')" or die("insert error");
 
	
	
	mysql_query($sql,$link);
?>
</p>
</html>

