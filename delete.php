<?php
session_start();
if($_SESSION['logedin']==1){
include("connection.php");
$id = $_GET['id'];
$q = "DELETE FROM users WHERE id = '$id' ";
$res = mysqli_query($conn,$q);
	if ($res) {
		header('location:secert.php');
	}else{
		echo "error";
	}
}

else{
echo "not deleted";
}

?>