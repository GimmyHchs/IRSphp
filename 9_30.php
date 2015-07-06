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
//學生端註冊點名
$abc="select authority from staff where authority='1'";
$abcd = mysql_query($abc, $link) or die(mysql_error());
		$abcde= mysql_num_rows($abcd);
		//echo $abcde;
$ABC="select max(id) from staff";
$ABCD=mysql_query($ABC,$link);
$ABCDE= mysql_result($ABCD,0);
if($abcde<$ABCDE){
	$c="UPDATE staff  SET IMEI='$IMEI' where authority='0'";
	$d=mysql_query($c,$link)or die(mysql_close ($link));
	
	$e="UPDATE staff  SET authority='1' where IMEI='$IMEI'";
	$f=mysql_query($e,$link)or die(mysql_close ($link));
	
	
	$query_rs = "SELECT name from  staff  where IMEI='$IMEI'";
		$z = mysql_query($query_rs, $link) or die(mysql_error());
		
		$x = mysql_num_rows($z);
		//echo $x;

	$aa="SELECT name from  staff  where IMEI='$IMEI'";
	$result = mysql_query($aa); 
	while ($row = mysql_fetch_array($result)) 
	{ 
	if($x==1)
		{
		echo $row['name'].'已經註冊成功';	
		}
	else
		{ 
	 echo $row['name'];
		}
	}
	
	if ($x<1)
		{
		echo "註冊失敗";
		}
	   if ($x>=2)
	   {
		   echo '(資料有重複)';
		   }
		   
}
		  
		
	
	?>
