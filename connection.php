<?php
$conn = mysqli_connect('localhost', 'root', 'root','crud');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	echo "";
}
?>