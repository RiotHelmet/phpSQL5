<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users";
$result = $conn->query($sql);
   

$login_success = false;
$full_name = "";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["username"] == $_POST["username"] &&
                    $row["password"] == $_POST["password"]) {
            $login_success = true;
            }
    }
} else {
    echo "0 results";
}
if($login_success) {
    echo "Login Success!!";
} else {
    echo "Login Failed";
}

$conn->close();

?>