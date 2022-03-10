<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product Page</title>
	<style type="text/css">
		body
		{
			background-color: whitesmoke;
		}
		#outer
		{
			overflow: hidden;
		}
		
		.adjust
		{
			float: left;
			box-sizing: border-box;
            display: inline-block;
            position: relative;
            left: 12.5%;
            background-color: none;
            width: 11%;
            margin-left:  6%;
            margin-top: 5%;
            border: 1px solid black;




		}
		a
		{
			text-decoration: none;
			color: black;
		}
		img
		{
			box-decoration-break: all;
			width: 100%;
			height: 40vh;
			border-bottom: 1px solid black;
			
			
		}
		.main
		{
			margin: auto;
			position: static;

			
			

		}
		label
		{
			position: relative;
			left: 3%;
		}
		p.name
		{
			margin-left: 5%;
			font-weight: bold;
			margin-bottom: 3.5%;
		}

		div.head
{
	background-color: none;
	width: 100%;
	margin: 0 auto;
	pointer-events: none;
}
	</style>
</head>

<body>
	
<?php

session_start();
require "CommonClass.php";
	$obj = new MyClass(); 

include "header.php";
echo "<div class='head'>
		<a href=''>
			<img class='heading' src='Admin/banner.png'>
		</a>
	</div>";
$email=$_SESSION['email'];
if($_SESSION['email'])
{
	
	$con = $obj->GetConnection();
	$str = "select * from registertbl where email = '$email' limit 1";

		$result=mysqli_query($con,$str);
		if($result)
		{
			$page_data = mysqli_fetch_assoc($result);
			$Name=$page_data['Name'];
			echo "Hello $Name";
			$id=$page_data['Id'];
		}
	}
		
else
{
	header("location:Index.php");
}

	//
	
	
	
	
	$con = $obj->GetConnection();
    $strsql="SELECT Productcode,PHOTOURL,company,price,PRODUCTDETAILS FROM Master1";
    $result=$con->query($strsql);
    $count=0;
    while($rows=$result->fetch_array())
    {
    	$count++;
    	$path=$rows['PHOTOURL'];
    	$Name=$rows['company'];
    	$detail=$rows['PRODUCTDETAILS'];
    	$price=$rows['price'];
    	$pc=$rows['Productcode'];
    
        echo
        "
        <a href='Admin/ViewDetails.php?pcode=$pc&id=$id'>
        <div class='adjust' id='outer'>
        <img src='Admin/$path'>
        <p class='name'>$Name</p>
        <label>$detail</label>
        <p class='name'>&#x20B9 $price</p>

        </div>
         </a>";
         if($count==4)
        {
        	echo "<div style='clear:both;'></div>";
        	$count=0;
        }
        //echo "";
    } 
	?>




</body>
</html>