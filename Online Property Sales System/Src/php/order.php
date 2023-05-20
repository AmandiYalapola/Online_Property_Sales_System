<?php
	$pid = $_POST['pid'];
	$otype = $_POST['otype'];

	// Database connection
	$conn = new mysqli('localhost','root','','property_lanka');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into orders(Property_Id, Order_Type) values(?, ?)");
		$stmt->bind_param("is", $pid, $otype);
		$execval = $stmt->execute();
		echo $execval;
		echo "Order successful...";
		$stmt->close();
		$conn->close();
	}
?>