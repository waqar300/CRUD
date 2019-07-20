<?php
session_start();
if($_SESSION['logedin']==1){
include("connection.php");

error_reporting(0);
$_GET['id'];
$_GET['fn'];
$_GET['ln'];
$_GET['p']; 
$_GET['e'];


	if(isset($_GET['submit'])) {
		
		// echo "<pre>";
		// var_dump($_GET['id']);
		// echo "</pre>";

		$id = $_GET['id'];
		$first_name = $_GET['first_name'];
		$last_name = $_GET['lname'];
		$phone = $_GET['phone'];
		$email = $_GET['email'];
		
		$q="UPDATE users set first_name='$first_name',last_name='$last_name',phone='$phone',email='$email' WHERE id='$id' ";
	$res = mysqli_query($conn,$q);
	if ($res) {
		header('location:secert.php');
	}
	else{
		echo "Record Not updated";
	}

	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>    
<form method="GET" action="update.php" >
	<input type="text" name="id" value="<?php echo $_GET['id'];?>" readonly>
<input type="text" name="first_name" placeholder="Your Name" value="<?php echo $_GET['fn'];?>" >
<input type="text" name="lname" placeholder="Your last Name" value="<?php echo $_GET['ln'];?>" >
<input type="integer" name="phone" placeholder="Phone Number" value="<?php echo $_GET['p'];?>" >
<input type="email" name="email" placeholder="Email" value="<?php echo $_GET['e'];?>" >
<input type="submit" name="submit" value="update">
</form>


</body>
</html>
<?php
}
?>