<?php     
session_start();
$userid = $_SESSION['userId'];
$conn = new mysqli("localhost", "root","", "list_app");


session_destroy();
header("Location: http://localhost/To%20Do%20List/logIn.php", true);
exit();


?>