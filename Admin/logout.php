<?php
session_start();
unset($_SESSION['email']);
header("location:http://localhost/projectv/Admin.php");
?>