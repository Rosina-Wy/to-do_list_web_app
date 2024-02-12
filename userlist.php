<?php
session_start();
$conn = new mysqli("localhost", "root","", "list_app");

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width">
	<title> List App </title>
	<link href="userlist.css" rel="stylesheet" type="text/css"/>

	</head>

	
	<body>
	
	<div id="appTitleBox"><h2 id="appTitle">TO DO APP</h2></div>
    <h3 id ="pageTitle">My List</h3>

    
<?php
     //echo "before if statement";
     
   

if(isset($_SESSION['userId'])){

    $userid = $_SESSION['userId'];

    //echo "in if statement";
   


$result = $conn->query("SELECT* FROM`list_content` WHERE $userid = `list_content`.`owner_id` ;");

?>
<table id="list">
<tr>
            <th></th><th>Title</th><th>Description</th>
            </tr>
<?php

foreach($result as $row){
    $id = $row['item_id'];

    ?>

    <tr <?php if($row['striked']==1){ ?> style="text-decoration:line-through" <?php }  ?> id="row<?php echo $id; ?>">
    <td><input type="checkbox" id="checkbox" data-id="<?php echo $id; ?>"></td>
    <td><?=$row['title']?></td><td><?php echo $row['description'];?></td>
    <td><form action="edit.php" method=POST>
    <input type="hidden" name="itemId" value="<?php echo $id; ?>">
    <input name="editButton" type="image" src="edit.png" height=20 width=20 >
    </form></td>
    </tr>
    <?php
    
    

}
?>
</table>   


<?php


?> 
<form id="deleteForm" action="delete.php">
    <input id="deleteButton"type="submit" value="Remove marked items" />
</form>
<form id="logOutForm" action="logOut.php">
    <br>
    <input id="logOutButton" type="submit" value="Log out"/>
</form>


<form action="addToList.php" method=POST id="add">
    <h3 id="addTitle">Add List Item </h3>
     <text id="titleinstructions">Title</text>
        <input name="titleName" id="titleInput" type="text" value="Title" required/>
        <text id="descriptioninstructions">Description</text>
		<input name="descriptionName" id="descriptionInput" type="text" value="Description" required/>
        <input name="submitListItem" type="submit" value="Submit"/>
</form>

<script src="userlist.js"></script>
</body>
<?php
}else{
header("Location: http://localhost/To%20Do%20List/logIn.php", true);  
exit(); 
}
//pop up message and send to log in page
?>
