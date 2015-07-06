<?php
$database_link = "staff";
$username_link = "staff";
$password_link = "0935820227";
// 建立資料庫連線
$link = mysql_pconnect("localhost", $username_link, $password_link) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES utf8",$link);
mysql_query("SET CHARACTER_SET_CLIENT=utf8",$link);
mysql_query("SET CHARACTER_SET_RESULTS=big5",$link);
mysql_select_db($database_link, $link); 
header("Content-Type:text/html; charset=big5");
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=123.csv");


 $z5="select count(IfOpenanswer) from openanswer where IfOpenanswer='T'";
	 $z6=mysql_query($z5,$link);
	 $z7= mysql_result($z6,0);

   	$a1="select max(answer_id) from answer ";
	 $b1=mysql_query($a1,$link);
	 $c1= mysql_result($b1,0);
	 
	 $d1="select TopicNo from answer where answer_id=$c1 ";
	 $e1=@mysql_query($d1,$link);
	 $f1= @mysql_result($e1,0);
	 
	 
	 $g1="select max(id) from staff";
	 $h1=mysql_query($g1,$link);
	 $i1= mysql_result($h1,0);


	$j1="select answer,CorrectAnswer from answer ";
	$k1=mysql_query($j1,$link);
	while ($row = mysql_fetch_array($k1)) 
		
		{
			
			 $l1[]=$row['answer'];
				
				
			 $m1[]=$row['CorrectAnswer'];
				
			}	
	 	$n1="select studentno,name from staff";
	 	$o1=mysql_query($n1,$link);
		while ($row1 = mysql_fetch_array($o1)) 
		
		{
			$p1[]=$row1['studentno'];
			$q1[]=$row1['name'];
				
		}
		echo "studentno,";
		echo "        name,";
		for($a=1;$a<=$z7;$a++)
		{
			echo 'Question'.$a.',';
			
			
			}
			echo ("\n");
		$z1[]=0;
		$z2[]=0;
		$z8=1;
		$z9=0;
		for($z4=0;$z4<$i1;$z4++) //幾個人
		{
			$z2[$z4]=0;
			$z1[$z4]=0;
			$z8=$z9;
			echo " ".$p1[$z4]."'".','.'    '.$q1[$z4].",";           
	for($a=0;$a<$z7;$a++)  //幾題
	{
		
	if($l1[$z8]==$m1[$z8])
	{
		echo "1,";
		
	
		}
		else
	{
		echo "0,";
		
		
	}

	$z8=$z8+$i1;
	}
	$z9++;
	echo ("\n");
		}

?>
