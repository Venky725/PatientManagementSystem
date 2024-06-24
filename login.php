<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
     
    $conn = new mysqli('localhost', 'root', '', 'register');
    if ($conn->connect_error) {
        die("Failed to connect : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM nurse WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['password'] == $password) {
                echo "<script>
                        alert('Login successful');
                        window.location.href = 'nurse.html'; 
                      </script>";
            } else {
                echo "<script>
                        alert('Invalid username or password');
                        window.location.href = 'login.html'; 
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Invalid username or password');
                    window.location.href = 'login.html'; 
                  </script>";
        }
        $stmt->close();
        $conn->close();
    }
?>