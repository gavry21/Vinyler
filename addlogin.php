<?php
header('Content-Type: text/html; charset=utf-8');
	
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "shop"; 
$table = "usertbl"; 

$connection= mysqli_connect ($host, $user, $password);
if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
mysqli_select_db($connection, $dbase);


$query = mysqli_query($connection,"SELECT * FROM usertbl WHERE `username`='$username' AND `password` ='$password'");

$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
 
 if($dbusername == admin && $dbpassword == admin)
 {
	
	 $_SESSION['session_username']=$username;	 
   header("Location: indexAdmin.php");
	}
	
  if($username == $dbusername && $password == $dbpassword)
 {
	
	 $_SESSION['session_username']=$username;	 
   header("Location: index.php");
	}
	} 
	 else {
    $message = "All fields are required!";
	}

	?>

