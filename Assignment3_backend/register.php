<?php
	session_start();
	class register
    {
        public function setValues(){
    
            if(isset($_POST['user'])) {
				$_SESSION['username'] = $_POST['user'];
        }
        else{
            return false;
		}
		if(isset($_POST['password'])) {
			$_SESSION['password'] = $_POST['password'];
        }
        else {
            return false;
		}
	}
}
	
	if(isset($_POST['user'])) {
		$_SESSION['username'] = $_POST['user'];
	}
	if(isset($_POST['password'])) {
		$_SESSION['password'] = $_POST['password'];
	}
	
	//$_SESSION['username'] = $_POST['user'];
    //$_SESSION['password'] = $_POST['password'];
    
	// Database connection
	$conn = new mysqli("localhost", "root","","profile");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer_profile(username, password) values(?, ?)");
		$stmt->bind_param("ss", $_SESSION['username'], $_SESSION['password']);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
        header("location:profile.html");
		$stmt->close();
		$conn->close();
	}
?>
