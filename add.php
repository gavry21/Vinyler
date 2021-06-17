<?php
header('Content-Type: text/html; charset=utf-8');

$user_name = $_POST['user_name'];
$country = $_POST['country'];
$city = $_POST['city'];
$address = $_POST['address'];


$user = "root"; //Enter the user name
$password = ""; //Enter the password
$host = "localhost"; //Enter the host
$dbase = "shop"; //Enter the database
$table = "product_order"; //Enter the table name

$connection= mysqli_connect ($host, $user, $password);
if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
mysqli_select_db($connection, $dbase);

$result = mysqli_query($connection,"INSERT INTO ".$table." (user_name,country, city, address)
VALUES ('$user_name', '$country', '$city', '$address')");

 if ($result == true){
		header("Location: index.php");
    }else{
    	echo "Not done";
    }

mysqli_close($connection);
?>
	

