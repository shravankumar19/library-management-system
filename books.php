<?php
session_start();
include "db.php";

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Books</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f9;
    margin: 0;
}

.header {
    background: #2c3e50;
    color: white;
    padding: 15px;
    text-align: center;
}

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

.container {
    padding: 20px;
}

h2 {
    text-align: center;
}

table {
    width: 90%;
    margin: auto;
    border-collapse: collapse;
    background: white;
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
    <h1>📚 Library Dashboard</h1>
    <p>Welcome, <?php echo $_SESSION['user']; ?> 👋</p>
</div>

<div class="nav">
    <a href="books.php">Home</a>
    <a href="my_books.php">My Books</a>
    <a href="request_book.php">Request Book</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Available Books</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Quantity</th>
        </tr>

        <?php
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['book_name']."</td>
                <td>".$row['author']."</td>
                <td>".$row['quantity']."</td>
                </tr>";
            }
        }
        ?>
    </table>
</div>

</body>
</html>
