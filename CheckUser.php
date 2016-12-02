<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = strval($_GET['q']);
$pass = strval($_GET['pass']);

$con = mysqli_connect('localhost','id255740_digitdb','jody08','id255740_digitdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} else {
$sql="SELECT * FROM users WHERE username = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
	$password = $row['password'];
	if ($pass == $password) {
	echo "match";
	} else {
	echo "no";
	}
}

mysqli_close($con);
}
?></body>
</html>