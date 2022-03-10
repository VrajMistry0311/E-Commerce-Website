<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body
{
  margin: 0;
  padding: 0;
  font-family: monospace;
}
ul {
  list-style-type: none;
  margin: 0px;
  padding: 0px;
  overflow: hidden;
  background-color:#e5e8e8;


}

li {
  float: left;
  border-right:1px solid #bbb;
  color: black;
}

li:last-child {
  border-right: 1px solid #bbb;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover{
  background-color: whitesmoke;
}
	</style>
</head>
<body>
	<ul>
		<li><a href="MainPage.php">Home</a></li>
		<li><a href="#">New Products</a></li>
		<li><a href="#">Dummies</a></li>
		<li style="float:right"><a href="logout.php">Logout</a></li>

		<li style="float:right"><a href="#"><?php
        echo $_SESSION['email'];   
	?></a></li>

	</ul>

</body>
</html>