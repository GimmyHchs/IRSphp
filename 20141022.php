<?php

// 資料庫相關資料
$database_dblink = "staff";
$username_dblink = "staff";
$password_dblink = "0935820227";


// 建立資料庫連線
$dblink = mysql_pconnect("localhost", $username_dblink, $password_dblink) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES utf8",$dblink);
mysql_query("SET CHARACTER_SET_CLIENT=utf8",$dblink);
mysql_query("SET CHARACTER_SET_RESULTS=utf8",$dblink);
mysql_select_db($database_dblink, $dblink);


// 宣告utf-8的編碼
header("Content-Type:text/html; charset=utf-8");
// 接收POST/GET的資料
 $z5="select count(IfOpenanswer) from openanswer where IfOpenanswer='T'";
	 $z6=mysql_query($z5,$dblink);
	 $z7= mysql_result($z6,0);






$a1="select max(answer_id) from answer ";
	 $b1=mysql_query($a1,$dblink);
	 $c1= mysql_result($b1,0);
	 
	 $d1="select TopicNo from answer where answer_id=$c1 ";
	 $e1=mysql_query($d1,$dblink);
	 $f1= mysql_result($e1,0);
	 
	 
	 $g1="select max(id) from staff";
	 $h1=mysql_query($g1,$dblink);
	 $i1= mysql_result($h1,0);


	$j1="select answer,CorrectAnswer from answer  ";
	$k1=mysql_query($j1,$dblink);
	while ($row = mysql_fetch_array($k1)) 
		
		{
			
			 $l1[]=$row['answer'];
				
				
			 $m1[]=$row['CorrectAnswer'];
				
			}	
			
	 	
		
		//echo(json_encode($output));
		
		$z1[]=0;
		$z2[]=0;
		$z8=1;
		$z9=0;
		for($z4=0;$z4<$i1;$z4++) //幾個人
		{
			$z2[$z4]=0;
			$z1[$z4]=0;
			$z8=$z9;
			               
	for($a=0;$a<$z7;$a++)  //幾題
	{
		
	if($l1[$z8]==$m1[$z8])
	{
		$z1[$z4]++;
		
	
		}
		else
	{
		$z2[$z4]++;
		
		
	}

	$z8=$z8+$i1;
	}
	$z9++;
		}
	
	
	$z11=1;
	for($z3=0;$z3<$i1;$z3++)
		{	
		
			//echo(json_encode($output[$z3]));
			$sql="UPDATE  studentcsv  SET `right`='$z1[$z3]' where id='$z11'";
			$result=mysql_query($sql,$dblink);
			
			$sql1="UPDATE  studentcsv  SET mistake='$z2[$z3]' where id='$z11'";
			$result1=mysql_query($sql1,$dblink);
			$z11++;
			//echo $z1[$z3].$z2[$z3];
			
		}
		
		
		$query_rs1 = "SELECT * FROM `studentcsv`";
		$rs1 = mysql_query($query_rs1, $dblink) or die(mysql_error());
		//$row = mysql_fetch_assoc($rs);
		//$row_count = mysql_num_rows($rs);
		//echo $row['name'];
		
		while($r = mysql_fetch_assoc($rs1))
		{
			$output[] = $r;
		}
		
		echo(json_encode($output));

		

	
?>