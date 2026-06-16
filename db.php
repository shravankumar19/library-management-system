<?php

$host = "sql100.infinityfree.com";
$user = "if0_41464645";
$pass = "projectlms12345";   // ✅ your password
$db   = "if0_41464645_lms";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed");
}

?>