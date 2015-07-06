<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form  action=""  method="POST">
	<p>題序:
     <input type="text" name="TopicNo"  />
            
</p>
	<p>&nbsp;</p>

  <p>
    <input name="btn" type="submit"  id="btn" />
  

<p>
    <? 
	
	//第二個存入data2的資料庫

	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	
	$sql = "insert into openanswer (IfOpenanswer,TopicNo,time) values('T','$TopicNo','$date_time')" or die("insert error");
 
	
	
	mysql_query($sql,$link);

	 ?>
</p>
</body>
</html>
