<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
		<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0066ff;
  color: white;
}
</style>
</head>
<body>
	<?php
	session_start();
	include "MainHeader.php";
	require "CommonClass.php";
	$obj = new MyClass();
	$con=$obj->GetConnection();
	$email=$_GET['email'];
	$str="select * from binfo where email='$email'";
	$result=mysqli_query($con,$str);
	if($result)
	{
		echo "<table id='customers'>
		<tr>
            <th>Coustomer Name</th>
            <th>Email-Id</th>
            <th>Company Name</th>
            <th>Price</th>
            <th>Size</th>
            </tr>";
		while($page_data=$result->fetch_array())
		{
			$fname=$page_data['Name'];
			$email=$page_data['email'];
			$cname=$page_data['Cname'];
			$price=$page_data['price'];
			$size=$page_data['size'];

            echo "<tr>
            <td>$fname</td>
            <td>$email</td>
            <td>$cname</td>
            <td>$price</td>
            <td>$size</td>
            </tr>";			
		}
		echo "</table>";
	}
?>
</body>
</html>