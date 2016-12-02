<!DOCTYPE html>
<html>
<body>
<?php
$username = strval($_GET['userName']);

$con = mysqli_connect('localhost','id255740_digitdb','jody08','id255740_digitdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} else {
$sql="SELECT * FROM users WHERE username = '".$username."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
	$wealth = $row['wealth'];
	echo "<p>";
	echo $wealth;
	echo "</p>";
	}
}

mysqli_close($con);
//return $wealth;
?></body>
</html>