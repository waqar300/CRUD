<?php
session_start();
include("connection.php");

if (isset($_POST['submit'])){
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Email Or Password is invalid";
	}else{
		$lemail=$_POST['email'];
		$pass=$_POST['password'];
		$lpassword=md5($pass);
		// chk

		$conn = mysqli_connect('localhost', 'root', 'root','crud');

		$q="SELECT email FROM users WHERE email='$lemail' AND password='$lpassword' ";
		$res = mysqli_query($conn,$q);
		if($res->num_rows>0){
			echo "success".$res->num_rows;
			$_SESSION['logedin']=1;
			$_SESSION['name']='waqar';
			$i=$_SESSION['logedin'];
			
		}else{
			echo "fail";
		}
	}
}else{
	echo "please register";
}

if($_SESSION['logedin']==1){

	header('location:secert.php');
}else{
	header('location:login.php');
}


?>