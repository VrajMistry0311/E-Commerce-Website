<!DOCTYPE html>
<html>
<head>
	<title>View Details</title>
	<style type="text/css">
		table,td,th,tr
		{
			margin: auto;
			margin-top: 8%;
			border: 1px solid black;
			width: 50%;
			text-align: center;
		}
		img
		{
			width: 100%;
		}
		input[type='submit']
{
   background-color: #0066ff;
   border-radius: 5px;
   color: white;
   
   cursor: pointer;
   display: block;
	width: 70%;
	margin: 16px auto;
	margin-top: 10px;
    box-sizing: border-box;
    padding: 10px;
	outline: none;
	border-radius: 5px;
	border: none;
}

	</style>
</head>
<body>
	<?php
	require "CommonClass.php";
	
	$obj = new MyClass();

	$con = $obj->GetConnection();
	
	$pc=$_GET['pcode'];
	$id=$_GET['id'];
	
	
	
	
    $strsql="SELECT Productcode,pname,size,Soldby,PHOTOURL,company,price,PRODUCTDETAILS FROM master1 where Productcode='".$pc."'";
    $result=$con->query($strsql);
    
    while($rows=$result->fetch_array())
    {

    	$path=$rows['PHOTOURL'];
    	$Name=$rows['company'];
    	$detail=$rows['PRODUCTDETAILS'];
    	$price=$rows['price'];
    	$size=$rows['size'];
    	$Soldby=$rows['Soldby'];
    	$pc=$rows['Productcode'];
    	$pname=$rows['pname'];
    	echo 
    	"<table>
    	<tr>
    	<td rowspan='6'><img src='$path'></td>
    		<td>Product Name : $Name $pname</td>
    	</tr>
    	<tr>

    	<td>$detail</td>
    		</tr>
    	<tr>
    	<td>Price : $price</td>
        </tr>
        <tr>
        <td>Size : $size</td>
        </tr>
        <tr>
        <td>Dealer: $Soldby</td>
        </tr>
        <tr>
        <td>Product Code : $pc</td>
        </tr>
    
    	</table>";

    }
    if(isset($_POST['sub'])) {

     
		$str="select * from registertbl where id='$id'";
		$result1=mysqli_query($con,$str);
		
		
		if($result1)
		{
			$page_data = mysqli_fetch_assoc($result1);
			$CName=$page_data['Name'];
		$lname=$page_data['Lname'];
		$email=$page_data['Email'];
		$pw=$page_data['Password'];

		$str1="insert into binfo values('$CName $lname','$email','$Name','$price','$size')";
		if($con->query($str1))
		{
			echo "Success";
		}
		else{
			echo "No Comparande";
		}
		}
		



	}

		

	

 
	?>
	<form method="post">
		<input type='submit' name='sub' id='sub' value='Buy Now'>
	</form>
   
</body>
</html>