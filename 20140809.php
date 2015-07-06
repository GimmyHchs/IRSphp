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
		//$c=選擇開放作答的ID(第一筆)
		//學生端做答
	date_default_timezone_set('Asia/Taipei');   
	$date_time = date("H:i:s");
	
		$a="select max(id) from openanswer";
		$b=mysql_query($a,$link);
		$c= mysql_result($b,0);
		
		//echo $c;
	    //透過$c來找$f=IfOpenanswer這欄位T還是F
		$d="SELECT IfOpenanswer from openanswer  where id=$c";
		$e=mysql_query($d,$link)or die(mysql_close ($link));
		$f= mysql_result($e,0);	
	
		//echo $f;
		//$ff選擇最大的answer_id
		$dd="select max(answer_id) from answer";
		$ee=mysql_query($dd,$link)or die(mysql_close ($link));
		$ff= mysql_result($ee,0);
		//echo $ff;
		//$hh透過$ff找尋topicno
		
		
		$aa="SELECT TopicNo from  answer  where answer_id=$ff";
		$gg=mysql_query($aa,$link)or die(mysql_close ($link));
		$hh= mysql_result($gg,0);
		
		//echo $hh;
		//判斷式IMEI只要在指定TOPIC第幾題才能修改,避免相同IMEI全部更改
		if($f!=F)
		{
			$k="UPDATE answer  SET answer='$answer' where IMEI='$IMEI'&&TopicNo='$hh'";
		$l=mysql_query($k,$link);
		
		
		
		$m="UPDATE answer  SET Student_time='$date_time' where IMEI='$IMEI'&&TopicNo='$hh'";
		$n=mysql_query($m,$link);
		
		}
		
		
		 
		$abcd = "select answer from answer where IMEI='$IMEI'&&TopicNo='$hh' ";
		$abcde = mysql_query($abcd, $link) or die(mysql_close ($link));
		
		$abcdef= mysql_result($abcde,0);
		
		
		
		echo $abcdef;
		
		$qwe = "select Student_time from answer where IMEI='$IMEI'&&TopicNo='$hh' ";
		$asd = mysql_query($qwe, $link) or die(mysql_close ($link));
		
		$zxc= mysql_result($asd,0);
		
		
		
		echo '    '.$zxc;
		echo " 伺服器時間";
	$a1="select authority from staff where authority='1'";
$a2 = mysql_query($a1, $link) or die(mysql_error());
		$a3= mysql_num_rows($a2);
		//echo $abcde;
	$a4="select max(id) from openanswer";
		$a5=mysql_query($a4,$link)or die(mysql_close ($link));
		$a6= mysql_result($a5,0);	
		
$a7="select IfOpenanswer from openanswer where id='$a6'";
$a8=mysql_query($a7,$link);
$a9= mysql_result($a8,0);
if($a9=="F")
{
	echo "123";
}
?>
 

