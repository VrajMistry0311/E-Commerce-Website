<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="ICss.css">
	<title>Sign-Up</title>

</head>
<body>
<?php
    include "IndexMain.php";
	require "CommonClass.php";
	$obj = new Myclass();
	$err="*Required Field";
	if(isset($_POST['submit']))
	{
		if(empty($_POST["name"]))
		{
			$err="Name Field Required";
		}
		else
		{

			if(empty($_POST['lname']))
			{
				$err="Last Name is Required";
			}
			else{
				if(empty($_POST['email']))
				{
					$err="Email is Required";
				}
				else{
					if(empty($_POST['password']))
					{
						$err='Password is Required';
					}
					else
					{
						$err="";
						$con = $obj->GetConnection();
		$name = mysqli_real_escape_string($con,$_REQUEST['name']);
		$lname = mysqli_real_escape_string($con,$_REQUEST['lname']);
		$email = mysqli_real_escape_string($con,$_REQUEST['email']);
		$pw = mysqli_real_escape_string($con,$_REQUEST['password']);
		$str = "insert into registertbl (Name,Lname,Email,Password) values ('$name','$lname','$email','$pw')";
		if(mysqli_query($con,$str))
		{
			$_SESSION['email']=$email;
			header('location:MainPage.php');
			die();
		}
		else
		{
			echo "Not successfull";
		}
					}
				}
			}
		}
	} 
	?>
	<div class="main">
		<div class="subc1">
	    <form method="post">
	    	<h2>Sign-up</h2>
	    	<p><?php echo $err; ?></p>
		<input type="name" name="name" placeholder="User Name*" required>
		<input type="lname" name="lname" placeholder="Last Name*" required>
		<input type="email" name="email" placeholder="E-mail*" required>
		<input type="password" name="password" placeholder="Password*" required>
		<input type="submit" name="submit">
		<p>Already a member?<a href="Index.php">Click Here</a></p>
	    </form>
		</div>
		
	</div>
	

</body>
</html>