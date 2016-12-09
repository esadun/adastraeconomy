<?php


$users = array();
$con = mysqli_connect('localhost','id255740_digitdb','jody08','id255740_digitdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} else {
$sql="SELECT username FROM users";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
	array_push($users,$row["username"]);
}
echo json_encode($users);

mysqli_close($con);
}
?>