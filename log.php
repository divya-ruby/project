<?php
	$email = $_GET['email'];
	$password = $_GET['Password'];
	

	$con = new mysqli("localhost","root","","log_in");
	if ($con->connect_error) {
		die("failed to connect : ".$con->connect_error);
			
		}else {
			$stmt = $con->prepare("SELECT * FROM `log` where email= ?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$stmt_result=$stmt->get_result();
			if ($stmt_result->num_rows > 0) {
				$data = $stmt_result->fetch_assoc();
				if ($data['Password']===$password) {
					echo "<h2>Login Successfully</h2>";
					echo "<a href='prj2.html'>Go Back To Home</a>";
				}else {
					echo "<h2> invald Email or Password </h2>";
					echo "<a href='loginp1.html'>Try Again</a>";
					echo "Don't have an Account <a href='gog.html'>Register Here</a>";
				}
				
			} else {
				echo "<h2> invald Email or Password </h2>";
				echo "<a href='loginp1.html'>Try Again</a>";
				echo "Don't have an Account <a href='gog.html'>Register Here</a>";
			}
		}
?>