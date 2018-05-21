<?php
session_start();
require_once 'db.php';

if(isset($_POST['submit'])){
	$usname = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$con_pass = $_POST['confirm_password'];
	if($pass !== $con_pass){
	echo "<script>alert('password is not matched !!')</script>";
	echo "<script type= 'text/javascript'>document.location = 'sing_up.php';</script>";
	}
	else if ($pass === $con_pass) {
		$query ="SELECT COUNT(id) AS total FROM user WHERE email = '$email'";
		$result = $dbcon->query($query);

		foreach ($result as $key) {
			if($key['total'] ==1){
				echo "<script>alert('This Email Already exit !!')</script>";
	echo "<script type= 'text/javascript'>document.location = 'sign_up.php';</script>";
			}
			else{
				$uspass = md5($pass);
				$query = "INSERT INTO user(username, email, password) VALUES('$usname', '$email', '$uspass')";
				$value = $dbcon->query($query);

				if(!empty($value)){
					echo "<script>alert('sing_up Successful !!')</script>";
	echo "<script type= 'text/javascript'>document.location = 'sign_up.php';</script>";
			
				}
				else{
					echo "<script>alert('sing_up Error !!')</script>";
	echo "<script type= 'text/javascript'>document.location = 'sign_up.php';</script>";
			
				}
			}
		}
	}
}
?>