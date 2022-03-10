<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Item</title>
	<link rel="stylesheet" type="text/css" href="ICss.css">
</head>
<body>

	<?php
	session_start();
	include "MainHeader.php";
	require "CommonClass.php";
        $obj = new MyClass();
        $msg="";
        $FinalCode="";
        function generateCode()
        {
        	
        	$count=1;
        	$obj = new MyClass();
          	$con=$obj->GetConnection();
        	while($count=1)
        	{
        		$gencode=$obj->getautogenNumber(5);
        		$strsql = "select count(*) as Ccount from Master1 where $gencode= Productcode";
        		$result=$con->query($strsql);
        		//$row=$result->fetch_array;
        		if($result['Ccount']==0)
        		{
        			$count=0;
        			$FinalCode=$gencode;
        			return $FinalCode;
        		}
        		else
        		{
        			$gencode=$obj->getautogenNumber(5);
        		}
        	}
        }
        if(isset($_POST['submit']))
	{
		
        
        $msg="";
        
        if ($_FILES['fuPPhoto']['size']>0)
        {
            $con=$obj->GetConnection();
            $pcode=$con->real_escape_string($_REQUEST['txtProductNo']);
            $com=$con->real_escape_string($_REQUEST['com']);
            $pname=$con->real_escape_string($_REQUEST['pname']);
            $price=$con->real_escape_string($_REQUEST['price']);
            $size=$con->real_escape_string($_REQUEST['size']);
            $pd=$con->real_escape_string($_REQUEST['pd']);
            $sold=$con->real_escape_string($_REQUEST['soldby']);
            $fullpath=$obj->savefile($pcode);
            if(file_exists($fullpath))
            {
            $sqlstr="insert into Master1 values('$pcode','$com','$pname',$price,'$size','$pd','$sold','$fullpath')";
            if($con->query($sqlstr))
            {
                $msg= "Successfully done";
                header('location:http://localhost:8080/ProjectV/Admin.php');
            }
            else
            {
               die("Error : ".$con->error);
            }
        }
        else
        {
            $msg="Error in file exists";
        }

      
       

    }
    else
    {
        
        $msg= "Please Select File To Upload";
    }
 
	} 
           
	?>

<div class="main">
		<div class="subc1">	
			<h2>Add Product</h2>
	<form method="post" enctype="multipart/form-data">
		  <label>Product ID : </label>
		  <?php $pnoFinal=generateCode(); ?>
		<input type="text" name="txtProductNo" id="txtProductNo" value ='<?php  echo "$pnoFinal"; ?>' readonly>
        <input type="text" name="com" id="com" placeholder="Company Name">
        <input type="text" name="pname" id="pname" placeholder="Product Name">
        <input type="text" name="price" id="price" placeholder="price">
        <input type="text" name="size" id="size" placeholder="Size">
        <input type="text" name="pd" id="pd" placeholder="Product Details">
        <input type="text" name="soldby" id="soldby" placeholder="Sold-by">
        <label>Select Photo : </label>
        <input type="file" name="fuPPhoto" id="fileid"><label><?php echo "$msg"; ?></label>
        <input type="submit" name="submit" id="submit">
	</form>
</div>
</div>
</body>
</html>