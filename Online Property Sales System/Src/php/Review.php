<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Review(name, phone, email, comment) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $phone, $email, $comment);
		$execval = $stmt->execute();
		echo $execval;
		echo "Thank you for your respond";
		$stmt->close();
		$conn->close();
	}
?>