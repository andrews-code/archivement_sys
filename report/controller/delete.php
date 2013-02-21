<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>title</title>
	<style type="text/css">
		#body{
			height : 400px;
		}
	</style>
</head>
<body>
<div>
<?php
	require "../viewer/header.php";
?>
</div>
<div id="body">
<center>
<?php
	$id= $_GET['id'];

	$conn = @mysql_connect("localhost:3306","root",""); 
	
	if(!$conn){die("error");} 
	
	@mysql_select_db("report_sys", $conn); 
	
	$sql = "select file_name FROM `monthly_report` WHERE `id` = ".$id; 

	$result = mysql_query($sql, $conn);
	$filename=mysql_fetch_object($result);
	$filepath="../".$filename->file_name;
	
	  if (file_exists($filepath)) {

	    if (unlink ($filepath)) {
//		      echo "The file was deleted successfully.", "n";
		  		$sql = "delete FROM `monthly_report` WHERE `id` = ".$id; 

				$result = mysql_query($sql, $conn);
				
				if($result){
					echo "Successfully deleted the file";
				}else{
					echo "Failed to delete the file";
				}
		  
		   } else {
		      echo "The specified file could not be deleted. Please try again.", "n";
		   }
	  }
	
?>
<br><br>
<a href="../index.php">Back to Homepage</a>
</center>
</div>
<div>
<?php
	require "../viewer/footer.php";
?>
</div>


</body>
</html>

