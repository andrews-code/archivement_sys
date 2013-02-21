<?php
/*
 * Created on Feb 19, 2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
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
	text-align: center;
}

#filetable{
	
}
</style>	
</head>
<body>
<div>
<?php
	require "header.php";
?>
</div>


<div id="body">
<center>
<table>
	<tr>
		
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><a href="../index.php">Back to homepage</a></td>
	</tr>
	<form action="../controller/upload.php" method="post" enctype="multipart/form-data">
	<tr>
		<td>Year
			<select name="year" size="1">
				<option value="2013">2013</option>
				<option value="2011">2014</option>
				<option value="2012">2015</option>
				<option value="2013">2016</option>
			</select>
		</td>
		<td>Month
			<select name="month" size="1">
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
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><label for="name">Monthly Report</label></td>
		<td>
		
		<input type="file" id="fileid" name="filename" size="50" maxlength="100000" accept="text/*" />
		</td>
		<td><input type="submit" value="submit" name="submit"/></td>
	</tr>
</form>
</table>
</center>
</div>

<div id="footer">
<?php
	require "footer.php";
?>
</div>
</body>
</html>