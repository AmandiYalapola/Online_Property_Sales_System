<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass=$_POST['pass'];
$mno=$_POST['mno'];
$dob=$_POST['dob'];
$email=$_POST['email'];


$conn = new mysqli('localhost','root','','Property_Lanka');
if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : " . $conn->connect_error);

} else {
		$stmt = $conn->prepare("insert into registration(fname,lname,pass,mno,dob,email)
		values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $fname, $lname,$pass,$mno,$dob,$email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>