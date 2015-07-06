<?php
// 資料庫相關資料
$database_link = "staff";
$username_link = "root";
$password_link = "0935820227";
// 建立資料庫連線
$link = mysql_pconnect("localhost", $username_link, $password_link) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES utf8",$link);
mysql_query("SET CHARACTER_SET_CLIENT=utf8",$link);
mysql_query("SET CHARACTER_SET_RESULTS=utf8",$link);
mysql_select_db($database_link, $link);
// 宣告utf-8的編碼
header("Content-Type:text/html; charset=utf-8");
		
	
	
		$a="UPDATE staff  SET IMEI='$IMEI' where name='$name'&&IMEI=''";
		$b=mysql_query($a,$link);
		
		
		
		
		
		
		$query_rs = "SELECT name from  staff  where IMEI='$IMEI'&&name='$name'";
		$z = mysql_query($query_rs, $link) or die(mysql_error());
		
		$x = mysql_num_rows($z);
		if($x==1)
		{
		echo '已經註冊成功';	
		}

	
	
	if ($x<1)
		{
		echo "註冊失敗";
		}
	   if ($x>=2)
	   {
		   echo '(資料有重複)';
		   }
		   




?>
<body>
	<form  action=""  method="POST">
	<p>
     <input type="text" name="name"  />
      <input type="text" name="IMEI"  />
      
            
</p>
	<p>&nbsp;</p>

  <p>
    <input name="btn" type="submit"  id="btn" />