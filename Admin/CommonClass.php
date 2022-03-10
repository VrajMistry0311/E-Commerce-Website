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
		function getautogenNumber($lim)
		{
			$str="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$code=substr(str_shuffle($str),0,$lim);
			return $code;
		}
		function savefile($code)
			{
				$fn=$_FILES['fuPPhoto']['name'];
				$exe=explode(".",$fn);
				$exe=end($exe);
				$exe=strtolower($exe);
				$temp=$_FILES['fuPPhoto']['tmp_name'];
				$fullpath="ProductPhoto/".$code.".".$exe;
				$fp="Admin/ProductPhoto/".$code.".".$exe;
				$myextension = array("jpg","jpeg","bmp","tif","gif","png","webp");

				if(in_array($exe,$myextension)===true)
				{
				   move_uploaded_file($temp,$fullpath);

				}
				return $fullpath;
			} 

		
	}
?>