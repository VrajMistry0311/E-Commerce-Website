<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="ICss.css">
</head>
<body>
	<?php
	require "CommonClass.php";
	include "indexmain.php";

	$obj= new MyClass();
	$con=$obj->GetConnection();
	
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
	    $pw=$_POST['password'];
       $str = "select * from adtbl where email='$email' AND pw='$pw' limit 1";
       $result=mysqli_query($con,$str);
       if($result)
       {
       	header("location:Admin/AddP.php");
       }
       else
       {
       	echo "Not successful";
       }


	}
	?>
	<div class="main">
		<div class="subc1">
			<h2>Admin</h2>

			<form method="post">
				<input type="email" name="email" placeholder="E-mail*" required>
			    <input type="password" name="password" placeholder="Password*" required>
                <input type="submit" name="submit" value="Log-in">
			</form>
		</div>
	</div>

</body>
</html>

?>