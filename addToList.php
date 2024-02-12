<?php
$conn = new mysqli("localhost", "root","", "list_app");
session_start();



    $userid = $_SESSION['userId'];
	if (isset($_POST['submitListItem'])) {
        $title = $_REQUEST['titleName'];
        $description = $_REQUEST['descriptionName'];
        $striked = 0;
        $query = $conn->prepare("INSERT INTO `list_content` (`owner_id`, `title`, `description`, `striked`) VALUES (?, ?, ?, ?);");
        $query->bind_param("issi", $userid, $title, $description, $striked);
		$query->execute();
		$result = $query->get_result();
        //redirect to userlist.php with header function
        header("Location: http://localhost/To%20Do%20List/userlist.php", true);  
		exit(); 
    }

?>