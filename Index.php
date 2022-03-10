<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log-out</title>
	<link rel="stylesheet" type="text/css" href="ICss.css">
</head>
<body>

	<?php
	session_start();
	include "indexmain.php";
	$err="Required*";
	require "CommonClass.php";
	$obj = new MyClass(); 
	if(isset($_POST['submit']))
	{
		
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$con = $obj->GetConnection();
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$str = "select * from registertbl where email = '$email' limit 1";
		$result=mysqli_query($con,$str);
		if($result)
		{
			if(mysqli_num_rows($result) > 0)
			{
				$page_data = mysqli_fetch_assoc($result);
				if($page_data['Password']=== $pass)
				{
					$_SESSION['email']=$email;
					header('location:MainPage.php');
					die();
				}
				else
				{
					$err="Password is incorrect";
				}
			}
			else{
				$err="Email doesn't exist";
			}
		}
		else
		{
			$err = "Email doesn't exist";
		}
        
		}
		else
		{
            $err="Email OR/And Password is Required";
		}
		
	
	}
	
	?>
	<div class="main">
		<div class="subc1">
			<h2>Log-in</h2>
			<p><?php echo $err; ?></p>

			<form method="post">
				<input type="email" name="email" placeholder="E-mail*" required>
			    <input type="password" name="password" placeholder="Password*" required>
                <input type="submit" name="submit" value="Log-in">
			    <p>Not a member? <a href="signup.php">Signup  Now</a></p>
			</form>
		</div>
	</div>

</body>
</html>