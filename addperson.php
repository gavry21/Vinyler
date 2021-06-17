<?php
header('Content-Type: text/html; charset=utf-8');
	
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$user = "root"; //Enter the user name
$password = ""; //Enter the password
$host = "localhost"; //Enter the host
$dbase = "shop"; //Enter the database
$table = "usertbl"; //Enter the table name

$connection= mysqli_connect ($host, $user, $password);
if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
mysqli_select_db($connection, $dbase);


$result = mysqli_query($connection,"INSERT INTO ".$table." (full_name, email, username,password)
VALUES ('$full_name','$email', '$username', '$password')");

 if ($result == true){
		header("Location: index.php");
		
    }else{
    	echo "Not done";
    }

mysqli_close($connection);

?>
