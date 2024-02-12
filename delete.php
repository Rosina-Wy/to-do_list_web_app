<?php     
session_start();
$userid = $_SESSION['userId'];
$conn = new mysqli("localhost", "root","", "list_app");

if(isset($_SESSION['userId'])){

// if (isset($_POST['deleteButton'])) {
$items = $conn->query("SELECT *FROM `list_content` WHERE `list_content`.`striked` = 1 ;");
foreach($items as $item){
    $itemSelected = $item['striked'];
if(!$itemSelected == 0){
     $conn->query("DELETE FROM `list_content`WHERE `striked` > 0;");
     //redirect to userlist.php with header function
     header("Location: http://localhost/To%20Do%20List/userlist.php", true);  
     exit(); 
}
}
// }
// else{
// header("Location: http://localhost/To%20Do%20List/userlist.php", true);  
//      exit(); 
//  }
}
?>