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
	$str="select * from binfo";
	$result=mysqli_query($con,$str);
	if($result)
	{
		echo "<table id='customers'>
		<tr>
            <th>Coustomer Name</th>
            <th>Email-Id</th>
            <th>More Details</th>
            </tr>";
		while($page_data=$result->fetch_array())
		{
			$fname=$page_data['Name'];
			$email=$page_data['email'];
            echo "<tr>
            <td>$fname</td>
            <td>$email</td>
            <td><a href='details.php?email=$email'>Detalis</a></td>
            </tr>";			
		}

		echo "</table>";

	}
	else
		{
			echo "No  Entry";
		}


	?>

</body>
</html>