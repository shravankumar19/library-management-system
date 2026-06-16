<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>

<style>
body{
    font-family: Arial;
    margin:0;
    background:#f4f4f4;
}

.navbar{
    background:#2c3e50;
    padding:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:white;
}

.container{
    padding:30px;
    display:flex;
    flex-wrap:wrap;
    gap:30px;
}

.card{
    background:white;
    padding:25px;
    width:220px;
    text-align:center;
    border-radius:10px;
    box-shadow:0 3px 8px rgba(0,0,0,0.2);
}

.card a{
    display:inline-block;
    margin-top:10px;
    text-decoration:none;
    color:white;
    background:#2c3e50;
    padding:8px 12px;
    border-radius:5px;
}
</style>

</head>

<body>

<div class="navbar">
<h2>User Dashboard</h2>
<a href="logout.php" style="color:white;">Logout</a>
</div>

<div class="container">

<div class="card">
<h3>Books</h3>
<a href="books.php">Open</a>
</div>

<div class="card">
<h3>Issue Books</h3>
<a href="issue_books.php">Open</a>
</div>

<div class="card">
<h3>Book Status</h3>
<a href="book_status.php">Open</a>
</div>

<div class="card">
<h3>Cancel Request</h3>
<a href="cancel_request.php">Open</a>
</div>

<div class="card">
<h3>Category Books</h3>
<a href="category_books.php">Open</a>
</div>

</div>

</body>
</html>