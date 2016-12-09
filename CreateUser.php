<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$username = strval($_GET['enteredUserName']);
$pass = strval($_GET['enteredPassword']);
$firstname = strval($_GET['enteredFirstName']);
$lastname = strval($_GET['enteredLastName']);

$con = mysqli_connect('localhost','id255740_digitdb','jody08','id255740_digitdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} else {
$sql="SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($con,$sql);
if ($result->num_rows > 0)  {
	echo "no";
} else {

$wealth = 0;
$sql = "INSERT INTO users (username, firstname, lastname, password, wealth)
VALUES ('$username', '$firstname', '$lastname', '$pass', '$wealth')";

if (mysqli_query($con, $sql)) {
	echo "okay";
} else {
	echo "error";
}
	}
mysqli_close($con);
}
?></body>
</html>