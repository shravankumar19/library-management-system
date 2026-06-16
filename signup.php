<?php

include "db.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];

// ❌ removed password_hash (causing mismatch)
$hashed_password = $password;

$sql = "INSERT INTO users(fullname,email,age,gender,username,password,phone)
VALUES('$fullname','$email','$age','$gender','$username','$hashed_password','$phone')";

if(mysqli_query($conn,$sql)){
    echo "success";
}else{
    echo "Error saving data";   // ✅ fixed (no mysqli_error)
}

?>