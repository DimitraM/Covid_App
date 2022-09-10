<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_POST['update_button']))
{
	require '../config.php';

	$update_username = $_POST['update_username'];
	$new_update_password = $_POST['update_new_password'];
	$update_comf_new_password = $_POST['update_comf_new_password'];
	$uppercase = preg_match('@[A-Z]@', $new_update_password);
	$lowercase = preg_match('@[a-z]@', $new_update_password);
	$number = preg_match('@[0-9]@', $new_update_password);
	$character = preg_match('@[/\W/]@',$new_update_password);

// an einai keno to username kai thelei na allaxei mono password
		if(isset($new_update_password) && isset($update_comf_new_password) && empty($update_username)){
				if(!$uppercase || !$lowercase || !$number || !$character || strlen($new_update_password) < 8){
					header("Location: ../change_credentials.php?error=wrongpassword");
					exit();
				}
				else if($new_update_password!== $update_comf_new_password){
					header("Location: ../change_credentials.php?error=passwordsdontmatch");
					exit();
				}
				else
				{
					$hashed_password = password_hash($new_update_password, PASSWORD_DEFAULT);
					if(mysqli_query($link, "UPDATE user SET password='".$hashed_password."' WHERE username='".$_SESSION['username']."'"))
					{
						$_SESSION['password']= $new_update_password;
						header("Location: ../change_credentials.php?update=success");
						exit();
					}
					else
					{
						header("Location: ../change_credentials.php?error=sqlerror");
						exit();
					}
				}
			}

			// an einai kena sto password kai thelei na allaxei mono username
			else if(empty($new_update_password) && empty($update_comf_new_password) && isset($update_username))
			{
				$username = mysqli_query($link, "SELECT username FROM user WHERE username='".$update_username."'");
				if($row = mysqli_fetch_array($username))
				{
					header("Location: ../change_credentials.php?error=usernametaken");
					exit();
				}
				else
				{
					if(mysqli_query($link, "UPDATE user SET username='".$update_username."' WHERE username='".$_SESSION['username']."'"))
					{
						header("Location: ../change_credentials.php?update=success");
						$_SESSION['username'] = $update_username;
						exit();
					}
					else
					{
						header("Location: ../change_credentials.php?error=sqlerror");
						exit();
					}
				}
		}

// an thelei na allaxei ta panta
		else if(isset($new_update_password) && isset($update_comf_new_password) && isset($update_username))
		{
				//Για την αλλαγή του password
				if(!$uppercase || !$lowercase || !$number || !$character || strlen($new_update_password) < 8){
					header("Location: ../change_credentials.php?error=wrongpassword");
					exit();
				}
				else if($new_update_password!== $update_comf_new_password){
					header("Location: ../change_credentials.php?error=passwordsdontmatch");
					exit();
				}
				else
				{
					$hashed_password = password_hash($new_update_password, PASSWORD_DEFAULT);
					if(mysqli_query($link, "UPDATE user SET password='".$hashed_password."' WHERE username='".$_SESSION['username']."'"))
					{
						$_SESSION['password']= $new_update_password;
						header("Location: ../change_credentials.php?update=success");
						exit();
					}
					else
					{
						header("Location: ../change_credentials.php?error=sqlerror");
						exit();
					}
				}

				//Για την αλλαγή του username
				$username = mysqli_query($link, "SELECT username FROM user WHERE username='".$update_username."'");
				if($row = mysqli_fetch_array($username))
				{
					header("Location: ../change_credentials.php?error=usernametaken");
					exit();
				}
				else
				{
					if(mysqli_query($link, "UPDATE user SET username='".$update_username."' WHERE username='".$_SESSION['username']."'"))
					{
						header("Location: ../change_credentials.php?update=success");
						$_SESSION['username'] = $update_username;
						exit();
					}
					else
					{
						header("Location: ../change_credentials.php?error=sqlerror");
						exit();
					}
				}
			}
		else {
			header("Location: ./Update-profile.php?error=no_req");
			exit();
		}
}


?>
