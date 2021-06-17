<?php
	
$comm = $_POST['comm'];

$user = "root"; //Enter the user name
$password = ""; //Enter the password
$host = "localhost"; //Enter the host
$dbase = 'shop'; //Enter the database
$table = "comm"; //Enter the table name

$connection= mysqli_connect ($host, $user, $password);
if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
mysqli_select_db($connection, $dbase);


$result = mysqli_query($connection,"INSERT INTO ".$table." (comm)
VALUES ('$comm')");

 if ($result == true){
    	echo "Отправлено";
    }else{
    	echo "Not done";
    }

mysqli_close($connection);

?>
