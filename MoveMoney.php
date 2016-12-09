<?php
$recipient = strval($_GET['recipient']);
$amount = strval($_GET['amount']);
$user = strval($_GET['payerUsername']);
$pass = strval($_GET['payerPassword']);
$note = strval($_GET['note']);
$con = mysqli_connect('localhost','id255740_digitdb','jody08','id255740_digitdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} else {
$sql="SELECT * FROM users WHERE username = '".$user."' AND password = '".$pass."'";
#echo $sql;
$result = mysqli_query($con,$sql);
$usernameGood=false;
while($row = mysqli_fetch_array($result)) {
	$usernameGood=true;
	$wealth = $row['wealth'];
	if($wealth>=$amount && $amount>0){
		$newWealthPayer=$wealth-$amount;
		$sql="UPDATE users SET wealth = ".$newWealthPayer." WHERE username = '".$user."'";
		if(mysqli_query($con,$sql)){
			$sql="UPDATE users SET wealth = wealth+".$amount." WHERE username = '".$recipient."'";
			if(mysqli_query($con,$sql)){
				$sql="INSERT INTO transactions (fromUser, toUser, amount, note) VALUES ('".$user."','".$recipient."',".$amount.",'".$note."')";
					if(mysqli_query($con,$sql)){
						echo "ok";
					}else{
						echo $sql;
						//echo "new error";
						//echo mysql_error();
						die("Error writing transaction log");
					}
			}else{
				die("Error updating recipient");
			}
		}else{
				die("Error updating payer");
			}
		
	}else{
		die("Invalid amount");
	}
}
if(!$usernameGood){
	die("Invalid username");
}


mysqli_close($con);
}