<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$recipient = strval($_GET['recipient']);
$amount = strval($_GET['amount']);
$user = strval($_GET['payerUsername']);
$pass = strval($_GET['payerPassword']);

$con = mysqli_connect('localhost','id255740_digitdb','jody08','id255740_digitdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} else {
$sql="SELECT * FROM users WHERE username = '".$user."' AND password = '".$pass."'";
#echo $sql;
$result = mysqli_query($con,$sql);
if(mysqli_fetch_array($result) == 0) {
	die('Invalid username/password');
}else{
while($row = mysqli_fetch_array($result)) {
	$wealth = $row['wealth'];
	if($wealth>=$amount && $amount>0){
		$newWealthPayer=$wealth-$amount;
		$sql="UPDATE users SET wealth = ".$newWealthPayer." WHERE username = '".$user."'";
		if(mysqli_query($con,$sql)){
			$sql="UPDATE users SET wealth = wealth+".$amount." WHERE username = '".$recipient."'";
			if(mysqli_query($con,$sql)){
				echo "ok";
			}
		}
		
	}else{
		die("Invalid amount");
	}
}
}

mysqli_close($con);
}
?></body>
</html>