<!DOCTYPE html>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "list_app");
?>
<html>
	<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width">
	<title> List App </title>
	<link href="logIn.css" rel="stylesheet" type="text/css"/>
	</head>

	
	<body>
	
	<div id="appTitleBox"><h2 id="appTitle">TO DO APP</h2></div>
    <h3 id ="pageTitle">Log In</h3>
   
    

    <form method=POST>
        <text id="usernameinstructions">Username</text>
        <input id="username" name="username" type="text" value="username" autocomplete="off" required/>
        <text id="passwordinstructions">Password</text>
		<input id="password" name="password" type="text" value="password" autocomplete="off" required/>
        <input name="submitToLogIn" type="submit" value="Submit"/>
    </form>
	<?php
	if (isset($_POST['submitToLogIn'])) {
		//above code tells following code only to run if data has been sumbitted, 
		$userName = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		
			$query = $conn->prepare("SELECT * FROM `users_accounts` WHERE `users_accounts`.`username` = ? AND `users_accounts`.`password` = ? ;");
			$query->bind_param("ss", $userName, $password);
			$query->execute();
			$result = $query->get_result();
		 
		
		//echo mysqli_num_rows($result);

		//echo "before loop";
		
		foreach($result as $row){

			
			$_SESSION['userId'] = $row["user_id"];
			
			$correctPassword = $row["password"];
			//echo "in loop";
			header("Location: http://localhost/To%20Do%20List/userlist.php", true);  
			exit();  
		}
		
		
		
		//log in fail message
		?>
			<h2 id="invalidLogInMessage">Invalid Log In Attempt<br><br>Try Again</h2>
		<?php

		// $users = $conn->query("SELECT * FROM `users_accounts`;");

		// foreach($users as $user){
		// 	$aValidUsername = $user['username'];
		// }

		// if(!$userName == $aValidUsername){
		// 		echo "username invalid";
		// }	

		// if($userName == $aValidUsername){
		// 		 if(!$password == $correctPassword){
		// 			echo "password invalid";
		// 		}
		// }
		
		//fail log in
		session_destroy();

		
}	
		
	
	?>

    </body>