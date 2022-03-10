<!DOCTYPE html>
<html>
<head>
<style>
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
  border-right: none;
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
  <li><a class="active" href="signup.php">Sign-Up</a></li>
  <li><a class="active" href="Index.php">Login</a></li>
  <li><a class="active" href="Admin.php">Admin</a></li>
  <li style="float:right"><a href="#about">About</a></li>
</ul>

</body>
</html>
