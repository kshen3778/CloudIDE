<?php
session_start(); //start the session for user profile page

define('DB_HOST','localhost'); 
define('DB_NAME','test'); //name of database
define('DB_USER','root'); //mysql user
define('DB_PASSWORD',''); //mysql password

$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());

$db = mysqli_select_db($con,DB_NAME) or die(mysqli_connect_error()); 

/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn(mysqli $con){
	if(!empty($_POST['user'])){ //checking the 'user' name which is from Sign-in.html, is it empty or have some text
		$query = mysqli_query($con,"SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysqli_connect_error());
		$row = mysqli_fetch_array($query); //or die(mysql_error());
		if(!empty($row['userName']) AND !empty($row['pass'])){
			$_SESSION['userName'] = $row['pass'];
			echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
		}
		else{
			echo "SORRY...YOU ENTERED WRONG ID AND PASSWORD...PLEASE RETRY...";
		}
	}else{
		echo "SORRY...YOU ENTERED WRONG ID AND PASSWORD...PLEASE RETRY...";
	}
}

if(isset($_POST['submit'])){
	SignIn($con);
}
?>