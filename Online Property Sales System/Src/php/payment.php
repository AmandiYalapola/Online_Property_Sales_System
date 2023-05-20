<?php
	$cname = $_POST['cname'];
	$cvn = $_POST['cvn'];
	$cno = $_POST['cno'];
	$date = $_POST['date'];

	// Database connection
	$conn = new mysqli('localhost','root','','propertylanka');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into payment(Cardholdername, CVN, CardNumber, Date) values(?, ?, ?, ?)");
		$stmt->bind_param("siis", $cname, $cvn, $cno, $date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Payment successful...";
		$stmt->close();
		$conn->close();
	}
?>