<?php
session_start(); // ✅ ADDED

include "db.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM users 
WHERE username='$username' OR email='$username'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    if(trim($row['password']) == $password){

        $_SESSION['user'] = $username; // ✅ ADDED

       header("Location: login_dashboard.php");
        exit();

    } else {
        echo "Invalid Username or Password";
    }

} else {
    echo "Invalid Username or Password";
}
?>