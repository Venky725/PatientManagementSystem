<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['username'])){
			$username=$_POST['username'];
		}
		if(isset($_POST['password'])){
			$password=$_POST['password'];
		}
		if(isset($_POST['number'])){
			$number=$_POST['number'];
		}
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		}
		$conn=new mysqli('localhost','root','','register');
		if($conn->connect_error)
		{
			die("connection failed: ".$conn->connect_error);
		}
		else{
			$stmt=$conn->prepare("INSERT INTO nurse(username,password,number,email) values(?,?,?,?)");
			$stmt->bind_param("siis",$username,$password,$number,$email);
			$stmt->execute();
			echo "<script>
                        alert('Invalid username or password');
                        window.location.href = 'index.html'; // Change this to the login page
                      </script>";
			$stmt->close();
			$conn->close();
		}
	}
?>