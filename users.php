<?php
session_start();
include "db.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Users</title>

<style>
body {
    font-family: Arial;
    margin: 0;
    background: #f4f6f9;
}

/* HEADER */
.header {
    background: #2c3e50;
    color: white;
    padding: 15px;
    text-align: center;
}

/* NAVBAR */
.nav {
    background: #34495e;
    padding: 10px;
    text-align: center;
}

.nav a {
    color: white;
    margin: 10px;
    text-decoration: none;
    font-weight: bold;
}

.nav a:hover {
    text-decoration: underline;
}

/* CONTENT */
.container {
    padding: 20px;
}

h2 {
    text-align: center;
}

/* TABLE */
table {
    width: 95%;
    margin: auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

th {
    background: #3498db;
    color: white;
    padding: 10px;
}

td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #f1f1f1;
}
</style>

</head>

<body>

<div class="header">
    <h1>👨‍💼 Admin Dashboard</h1>
    <p>Registered Users</p>
</div>

<div class="nav">
    <a href="Admin_dashboard.php">Dashboard</a>
    <a href="books.php">Books</a>
    <a href="users.php">Users</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Registered Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Username</th>
            <th>Phone</th>
        </tr>

        <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['fullname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['age']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['username']."</td>
                <td>".$row['phone']."</td>
                </tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>