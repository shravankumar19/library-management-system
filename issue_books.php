<?php
session_start();
include "db.php";

$sql="SELECT book_requests.id,
books.book_name,
book_requests.username,
book_requests.status
FROM book_requests
JOIN books 
ON book_requests.book_id = books.id";

$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
<title>Issue Books</title>

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
    width: 90%;
    margin: auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

th {
    background: #8e44ad;
    color: white;
    padding: 12px;
}

td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #f1f1f1;
}

/* BUTTON */
.btn {
    padding: 5px 10px;
    background: #2ecc71;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background: #27ae60;
}

/* STATUS COLORS */
.pending {
    color: orange;
    font-weight: bold;
}

.approved {
    color: green;
    font-weight: bold;
}
</style>

</head>

<body>

<div class="header">
    <h1>📚 Admin Dashboard</h1>
    <p>Book Requests</p>
</div>

<div class="nav">
    <a href="Admin_dashboard.php">Dashboard</a>
    <a href="books.php">Books</a>
    <a href="users.php">Users</a>
    <a href="issue_books.php">Requests</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Pending Book Requests</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Book</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        while($row=mysqli_fetch_assoc($result)){

            $statusClass = ($row['status']=="Pending") ? "pending" : "approved";

            echo "<tr>";

            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['book_name']."</td>";
            echo "<td class='$statusClass'>".$row['status']."</td>";

            echo "<td>";

            if($row['status']=="Pending"){
                echo "<a class='btn' href='approve_book.php?id=".$row['id']."'>Approve</a>";
            } else {
                echo "-";
            }

            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>