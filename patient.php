<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(isset($_POST['name'])){
			$name=$_POST['name'];
		}
		if(isset($_POST['age'])){
			$age=$_POST['age'];
		}
		if(isset($_POST['problem'])){
			$problem=$_POST['problem'];
		}
		if(isset($_POST['address'])){
			$address=$_POST['address'];
		}
		$conn=new mysqli('localhost','root','','register');
		if($conn->connect_error)
		{
			die("connection failed: ".$conn->connect_error);
		}
		else{
			$stmt=$conn->prepare("INSERT INTO patientregister(name,age,problem,address) values(?,?,?,?)");
			$stmt->bind_param("siss",$name,$age,$problem,$address);
			$stmt->execute();
			echo "<script>
                        alert('successfully Regestered!');
                        window.location.href = 'nurse.html';
                      </script>";
			$stmt->close();
			$conn->close();
		}
	}
?>