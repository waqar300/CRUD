<?php
session_start();
include("connection.php");
if($_SESSION['logedin']==1){

	$conn = mysqli_connect('localhost', 'root', 'root','crud');

	$q="SELECT*FROM users";
	$res = mysqli_query($conn,$q);

	echo '<a href="logout.php">logout</a>';	
?>

		<!DOCTYPE html>
		<html>
		<head>
		<title> Show Secret Data</title>
		</head>
		<body>

			<table align="center" border="3px" style="width: 600px;line-height: 40px;padding: 3px;margin: auto;table-layout: fixed;width: 100%;">
				<tr>
					<th colspan="6"><h2>Student Record</h2></th>
					<th colspan="2"><h2>Operation</h2></th>
				</tr>
				<tr>
					<th style="width: 15%;text-align: center;">Id</th>
					<th style="width: 15%;text-align: center;">First Name</th>
					<th style="width: 15%;text-align: center;" >Last Name</th>
					<th style="width: 15%;text-align: center;">Phone Number</th>
					<th style="width: 15%;text-align: center;">Email</th>
					<th style="width: 15%;text-align: center;">Status</th>
					<th style="width: 15%;text-align: center;">Update</th>
					<th style="width: 15%;text-align: center;">Delete</th>
				</tr>
					<?php 
						while ($row = mysqli_fetch_assoc($res)) {
					?>
						<tr>
							<td style="width: 15%;text-align: center;"><?php echo $row['id']; ?></td>
							<td style="width: 15%;text-align: center;"><?php echo $row['first_name']; ?></td>
							<td style="width: 15%;text-align: center;"><?php echo $row['last_name']; ?></td>
							<td style="width: 15%;text-align: center;"><?php echo $row['phone']; ?></td>
							<td style="width: 15%;text-align: center;"><?php echo $row['email']; ?></td>
							<td style="width: 15%;text-align: center;"><?php echo $row['active']; ?></td>
							<td style="width: 15%;text-align: center;"><a href='<?php print "update.php?id=$row[id]&fn=$row[first_name]&ln=$row[last_name]&p=$row[phone]&e=$row[email]"; ?>'><img src="edit.jpg" style="width: 50px;height: 55px"></a></td>
							<td style="width: 13%;text-align: center;"><a href='<?php echo "delete.php?id=$row[id]"; ?>'><img src="del.png" style="width: 50px;height: 55px;"></a></td>
						</tr>
						<?php
						}
						?>
			</table>

		</body>
		</html>
<?php
	} ?>
<!-- <?php
	// else{
		// header('location:login.php');
	// }
