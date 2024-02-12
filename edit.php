<?php
session_start();
$userid = $_SESSION['userId'];
$conn = new mysqli("localhost", "root","", "list_app");



    if(isset($_POST['editButton_x'])){

$item_Id = $_REQUEST['itemId'];
//echo $item_Id;

$query = $conn->prepare("SELECT * FROM `list_content` WHERE `item_id` = ?;");
			$query->bind_param("i", $item_Id);
			$query->execute();
			$result = $query->get_result();

    foreach($result as $list_item){
    $title = $list_item['title'];
    $description = $list_item['description'];
    }
   // echo $title;
   // echo $description;
?>
<form id="editForm" method="POST">
    <h3 id="editTitle">Edit List Item </h3>
     <text id="EditTitleinstructions">Edit Title</text>
        <input name="editTitleName" id="editTitleInput" type="text" value="<?php echo $title; ?>" required/>
        <input name="item_id" value="<?php echo $item_Id; ?>" type="hidden"/>
        <text id="editDescriptioninstructions">Edit Description</text>
		<input name="editDescriptionName" id="editDescriptionInput" type="text" value="<?php echo $description; ?>" required/>
        <input name="submitEditedListItem" type="submit" value="Submit"/>
</form>
<?php
    }

if (isset($_POST['submitEditedListItem'])) {

echo "in if statement";

$updatedTitle = $_REQUEST['editTitleName'];

$updatedDescription = $_REQUEST['editDescriptionName'];

$item_Id = $_REQUEST['item_id'];
echo $item_Id;



$query2 = $conn->prepare("UPDATE `list_content` SET `title`= ?,`description`= ? WHERE `item_id` = ?;");
        $query2->bind_param("ssi", $updatedTitle, $updatedDescription, $item_Id);
		$query2->execute();
		$result = $query2->get_result();


        header("Location: http://localhost/To%20Do%20List/userlist.php", true);  
        exit(); 



    }
?>
