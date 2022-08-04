<?php

$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$email = $_POST['email'];
$Password = $_POST['Password'];
$Confirm_Password = $_POST['Confirm_Password'];

//Database connection
$conn = new mysqli('localhost','root','','login');
if($conn->connect_error){
	die('Connection Failed :  '.$conn->connect_error);
} else{
	$stmt = $conn->prepare("INSERT INTO `registration`(`First_Name`, `Last_Name`, `email`, `Password`, `Confirm_Password`)  values(?,?,?,?,?)");
	$stmt->bind_param("sssss",$First_Name, $Last_Name, $email, $Password, $Confirm_Password);
	$output = $stmt->execute();
	echo $output;
	echo "registration successfully...";
	$stmt->close();
	$conn->close();
}
?> 

