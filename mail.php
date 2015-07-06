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
//設定時區
	
date_default_timezone_set("Asia/Taipei");

//建立唯一ID

$id = sha1(date('r', time()));

//收件者郵件地址 (收件者、副本、密本)

$to = "xcoortir@gmail.com";

//信件標題 (中文字必須使用mime編碼）

$subject = "=?utf-8?B?".base64_encode("這是測試夾檔的信件！")."?=";
$file_name="123.csv";

$fp = fopen($file_name, "rb"); // 開啟檔案
$read = fread($fp, filesize($file_name)); // 取得檔案內容 

//信件檔頭 (mime格式)

$headers = "\r\nContent-Type: text/csv;charset=big5

boundary=\"PHP-mixed-".$id."\"";

//收件者 (中文字必須使用mime編碼，可參考信件標題的寫法）

$headers .= "To: You <xcoortir@gmail.com>\r\n";

//寄件者

$headers .= "From: Me <xcoortir@gmail.com>\r\n";



//夾帶檔案




//信件內容

$body =$read;

//寄信

mail($to, $subject, $body, $headers);

?>