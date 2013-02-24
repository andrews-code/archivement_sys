<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="GENERATOR" content="PHPEclipse 1.2.0" />
	<title>Archive System</title>
<style type="text/css">

#body{
	height : 400px;
	width: 1024px; 
	margin:0 auto;
}

#filetable{
	
}
#alert_sentence{
	color: #297CA1;
    font-size: 20px;
    font-weight: bold;
    line-height: 100%;
    height : 50px;
}
</style>	
</head>
<body>
<div>
<?php
	require "viewer/header.php";
?>
</div>

<div id="body">
<center>
<table id="filetable" border="0" width="700px">
	<thead>
	<tr>
		<form action="index.php" method="get">
		<th colspan="4">
		   Key words: 
			<input type="text" class="keywords" name="keywords" size="20" maxlength="25" />
		   Year:
		   <select name="year" size="1">
				<option value="">Select Year</option>
				<option value="2013">2013</option>
				<option value="2011">2014</option>
				<option value="2012">2015</option>
				<option value="2013">2016</option>
			</select>
			Month
			<select name="month" size="1">
				<option value="">Select Month</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<input type="submit" class="submit button" name="Search" value="Search" />
		</th>
		</form>
	</tr>
	<tr>
		<th>Year</th>
		<th>Month</th>
		<th>Filename</th>
		<th>Delete</th>
	</tr>
	</thead>
<?php 
$keywords = @$_GET['keywords'];
$year = @$_GET['year'];
$month = @$_GET['month'];
if($keywords||$year||$month){
	
	$dbh = @mysql_connect("localhost:3306","root",""); 
	
	if(!$dbh){die("error");} 
	
	@mysql_select_db("report_sys", $dbh); 
	
	$q = "SELECT * FROM monthly_report where year like '%".$year."%' and month like '%".$month."%' and file_name like '%".$keywords."%' "; 

	$result = mysql_query($q, $dbh);

	$message_count = mysql_num_rows($result);
	$page_size = 20;
	$page = @$_GET['page']? $_GET['page']:0;
	
	$page_count = ceil($message_count/$page_size);
//	echo "---page_count--".$page_count;
	if ($page <=0) $page = 1;
	if($page>= $page_count) $page = $page_count;
	
	$offset = ($page - 1) * $page_size;
	$sql ="select * from monthly_report where year like '%".$year."%' and month like '%".$month."%' and file_name like '%".$keywords."%' order by id desc limit $offset, $page_size ";
	//echo $sql;
	$result = mysql_query($sql, $dbh); 
	 
while($row = mysql_fetch_object($result)){
?>

	<tr>
		<td><?=$row->year?></td>
		<td><?=$row->month?></td>
		<td><a target="_blank" href="<?=$row->file_name?>"> <?=$row->file_name?></a></td>
		<td><a href="javascript:if(confirm('Do you confirm delete this file?')){location='http://localhost/report/controller/delete.php?id=<?=$row->id?>'}">Delete</a></td>
	</tr>
	<tr>
		<td colspan="4" align="center">
<?php 

}

	
	$prev_page = $page - 1;
	$next_page = $page + 1;
	$last_page = $page_count;
	//echo "--page--".$page."--next page--".$next_page."<br>";
	if ($page <= 1){
		 echo "First page&nbsp;&nbsp;";
	}else {
		?> 
			<a href='index.php?page=1&year=<?=$year?>&month=<?=$month?>&keywords=<?=$keywords?>'>First page</a>&nbsp;&nbsp;
		<?php
	}
	if($prev_page <= 0 ){
		echo "<<&nbsp;&nbsp;";
	} else{
		?>
			<a href='index.php?page=<?=$prev_page?>&year=<?=$year?>&month=<?=$month?>&keywords=<?=$keywords?>'> << </a>&nbsp;&nbsp;
		<?php
	}	

	echo $page."&nbsp;&nbsp;";

	if($next_page > $page_count){
		echo ">>&nbsp;&nbsp;";
	} else{
		?>
		<a href='index.php?page=<?=$next_page?>&year=<?=$year?>&month=<?=$month?>&keywords=<?=$keywords?>'> >> </a>&nbsp;&nbsp;
		<?php
	}
	
	
	if($page >= $page_count){
		 echo "Last page&nbsp;&nbsp;";
	}else{
		?>
			<a href='index.php?page=<?=$last_page?>&year=<?=$year?>&month=<?=$month?>&keywords=<?=$keywords?>'>Last page</a>
		<?PHP
	} 
	
	echo "Total $page_count";
	
@mysql_close($dbh);
}else{
?>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center"><br><br>
			<span id="alert_sentence">Please select or fill condition</span>
		</td>
	</tr>
<?php	
	
}
?>
	<tr>
		<td colspan="2" > </td>
		<td colspan="2" align="right" height="50px"><a href="viewer/uploadpage.php">Upload file</a></td>
	</tr>
</table>
</center>
</div>
<div id="footer">
<?php
	require "viewer/footer.php";
?>
</div>
</body>
</html>
