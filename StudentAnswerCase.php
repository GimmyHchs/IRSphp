<?php require_once('Connections/book.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_book, $book);
$query_Recordset1 = "SELECT answer.IMEI, answer.answer, answer.CorrectAnswer FROM answer";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $book) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery-2.1.1.js"> </script>
<script>

function Push() {
	   var URLs="AnswerDecide.php";            
       var answer = $('#answer').val(); 
       var CorrectAnswer = $('#CorrectAnswer').val();
       var IMEI = $('#IMEI').val();
		$.ajax({
                url: URLs,
				cache: false,
                data: "&IMEI="+IMEI+"&CorrectAnswer="+CorrectAnswer+"&answer="+answer,
				async: false,
                type:"GET",
                dataType:'text',

                success: function(res){
					$('#msg').html(res);
                   
                },

                 error:function(xhr, ajaxOptions, thrownError){ 
                    alert(xhr.status); 
                    alert(thrownError); 
                 }
            });
			
            
			
	   
};
  var time1=1000;

  
  setInterval(function() { Push(); }, time1);
 
		
 
        </script>
</head>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 88px;
	top: 56px;
	width: 259px;
	height: 209px;
	z-index: 1;
	visibility: visible;
}
</style>
<body  bgcolor="black">
 
   </form>
  <tr>
    <td><div id = "msg"> </div></td>
     </tr>
   
  
</body>

</html>
