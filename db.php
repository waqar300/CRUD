<?php
include("connection.php");
if(isset($_POST['submit'])) {
if(isset($_POST['first_name']) && $_POST['first_name'] !=''){
	$name=$_POST['first_name'];
}
else{
	$error[]='name is missing';

}
if(isset($_POST['lname']) && $_POST['lname'] !=''){
	$lname=$_POST['lname'];
}
else{
	$error[]='last name is missing';

}
if(isset($_POST['phone']) && $_POST['phone'] !=''){
	$phone=$_POST['phone'];
}
else{
	$error[]='phone Number is missing';

}

if(isset($_POST['email']) && $_POST['email'] !=''){
	$email=$_POST['email'];
}
else{
$error[]='email is missing';
}

if(isset($_POST['password']) && $_POST['password'] !=''){
	$pass=$_POST['password'];
	$password = md5($pass);
}
else{
$error[]='password is missing';
}


if(!isset($error))
{

//id is auto increament
// email && mobile number is unique
$q="INSERT INTO `users`(`first_name`,`last_name`,`phone`,`email`,`password`) VALUES ('$name','$lname','$phone','$email','$password')";
mysqli_query($conn,$q);
if(isset($q)){

	header('location:login.php');
}
else{
	echo "not inserted";
}
}
else{

foreach ($error as $value) {
	# code...
	echo $value;
	echo '<br>';
}

}
}
?>