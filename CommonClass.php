<?php

      class MyClass
	{
		public $con;
		
		function GetConnection()
		{
			$con = mysqli_connect("localhost","root","","e-commerce");	
			if($con===false)
			{
				die("Could not connect to NG".mysqli_connect_error());
			}
			return $con;
		}

		function GenerateRandomAlphaNum($length_of_string) 
			{ 
  
    	  			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
     			return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
			}
			function savefile($code)
			{
				$fn=$_FILES['fuPPhoto']['name'];
				$exe=explode(".",$fn);
				$exe=end($exe);
				$exe=strtolower($exe);
				$temp=$_FILES['fuPPhoto']['tmp_name'];
				$fullpath="ProductPhoto/".$code.".".$exe;
				$myextension = array("jpg","jpeg","bmp","tif","gif","png","webp");

				if(in_array($exe,$myextension)===true)
				{
				   move_uploaded_file($temp,$fullpath);

				}
				return $fullpath;
			} 
		
	}
?>