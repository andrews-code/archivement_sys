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
<center>
<div>
<?php
	require "../viewer/header.php";
?>
</div>
<?php

$share_folder_path = "..\\upload\\";
$s_share_folder_path = "upload/";  

$year_folder	= $_POST['year'];
$month_folder 	= $_POST['month'];

if ( ($_FILES["filename"]["size"] < 200000000))
  {
  if ($_FILES["filename"]["error"] > 0)
    {
//     echo "Return Code: " . $_FILES["filename"]["error"] . "<br />";
    }
  else
    {
//    echo "Upload: " . $_FILES["filename"]["name"] . "<br /> " .
//    		"Type: " . $_FILES["filename"]["type"] . "<br /> " .
//    				"Size: " . ($_FILES["filename"]["size"] / 1024) . " Kb<br /> " .
//    						"Temp file: " . $_FILES["filename"]["tmp_name"] . "<br />";
//    
	$folderdir = $share_folder_path.$year_folder."\\".$month_folder."\\";

	if(is_dir($folderdir)){
		
	}else{
		mkdir($folderdir,0777, true) or die("cannot create folder");
//		echo "--folder->".$folderdir;
	}
	
    if (file_exists($folderdir. $_FILES["filename"]["name"]))
      {
      	echo $_FILES["filename"]["name"] . " already exists. ";
      }
    else
      {	      
//	      echo "--move->".$folderdir. $_FILES["filename"]["name"];
	      move_uploaded_file($_FILES["filename"]["tmp_name"],$folderdir. $_FILES["filename"]["name"]);
	      
	      $conn=mysql_connect("localhost","root","");
		  mysql_select_db("report_sys",$conn);
	     
	      $s_file_full_name=$s_share_folder_path.$year_folder.'/'.$month_folder.'/'.$_FILES["filename"]["name"];

	      $addfile="insert into `monthly_report` (`year`, `month`, `file_name`, `flag`) VALUES ('".$year_folder."', '".$month_folder."', '".$s_file_full_name."', 1)";
	      if(mysql_query($addfile)) {
	      	
	      }else{
	      	echo "Did not insert this item into Database";
	      }
	      
	      echo "Successfully Stored the file: " . $_FILES["filename"]["name"]."under". $folderdir ;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
  
?>

<div id="body">
<br><br>
<a href="../viewer/uploadpage.php">Continue add files</a> &nbsp;&nbsp;&nbsp;&nbsp;
<a href="../index.php">Back to Homepage</a>
</div>
</center>
<div>
<?php
	require "../viewer/footer.php";
?>
</div>


</body>
</html>


