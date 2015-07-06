<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form  action=""  method="POST">
	<p>正確答案:
    <input type="text" name="CorrectAnswer"  />
    </p>
    <p>
      <input name="btn" type="submit"  id="btn" />
  	</p>
   <p>
    <? 
	//存staff的資料庫
	date_default_timezone_set('Asia/Taipei');   
	$date_time = date("Y-m-d H:i:s");
	//老師輸入正確答案

	if ((isset($_POST["CorrectAnswer"])))
	{
	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	  $abc="select max(id) from staff";
	 $abcd=mysql_query($abc,$link);
	 $abcde= mysql_result($abcd,0);
	 //echo $abcde;
	 //選擇最大staff欄位最大的id
	 $d="select max(id) from staff";
	 $e=mysql_query($d,$link);
	 $f= mysql_result($e,0);
	 //echo $f;
	 //選擇最大answer欄位最大的answere_id
	 $j="select max(answer_id) from answer";
	 $k=mysql_query($j,$link);
	 $l= mysql_result($k,0);
	 //10-9等於1 第一筆輸入答案,第二筆輸入答案,以此類推
	 $l=$l-($abcde-1);
	 for ($i=0;$i<$f;$i++)	
	 {	
	$sql="UPDATE answer  SET CorrectAnswer ='$CorrectAnswer'  where answer_id='$l'";
	$l++;
	$result = mysql_query($sql);
	}}
	 ?>
  </p>
  <p>
    <? 
	
	//第二個存入data2的資料庫
	if ((isset($_POST["CorrectAnswer"])))
	{
	 $link = mysql_pconnect("localhost", "staff", "0935820227");
	 mysql_select_db("staff",$link) or die("無法選擇資料庫");
	 mysql_query("SET NAMES 'utf8'");
	
	$dd="select max(id) from openanswer";
	$ee=mysql_query($dd,$link);
	$ff= mysql_result($ee,0);
	//echo $ff;

		$aa="SELECT TopicNo from openanswer  where id=$ff";
		$gg=mysql_query($aa,$link);
		$hh= mysql_result($gg,0);
	$sql = "insert into openanswer (IfOpenanswer,TopicNo,time) values('F','$hh','$date_time')" or die("insert error");
	mysql_query($sql,$link);
	//echo $hh;
	}
	
	 ?>
     
     
     
     
 
     
    

</p>
  
 
</p>
</body>
</html>