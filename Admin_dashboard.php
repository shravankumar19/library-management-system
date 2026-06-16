<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: index.html");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body{
    font-family: Arial;
    margin:0;
    background:#f4f6f9;
}

/* NAVBAR */
.navbar{
    background:#2c3e50;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:white;
}

.left span{
    font-size:20px;
    font-weight:bold;
}

.right a{
    color:white;
    text-decoration:none;
    font-size:16px;
    margin-left:15px;
}

.right a:hover{
    text-decoration:underline;
}

/* MAIN */
.container{
    padding:30px;
    text-align:center;
}

h1{
    margin-bottom:30px;
}

/* GRID */
.grid{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:30px;
}

/* CARD */
.card{
    background:white;
    padding:25px;
    width:220px;
    border-radius:10px;
    box-shadow:0px 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

/* ICON */
.card h3{
    margin-bottom:10px;
}

/* BUTTON */
.btn{
    display:inline-block;
    margin-top:10px;
    padding:8px 15px;
    background:#3498db;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.btn:hover{
    background:#2980b9;
}

/* DIFFERENT COLORS */
.card:nth-child(1){border-top:5px solid #3498db;}
.card:nth-child(2){border-top:5px solid #2ecc71;}
.card:nth-child(3){border-top:5px solid #e67e22;}
.card:nth-child(4){border-top:5px solid #9b59b6;}

</style>
</head>

<body>

<div class="navbar">
<div class="left">
    <span><?php echo $_SESSION['admin']; ?></span>
</div>

<div class="right">
<a href="about.php">
<img src="about.jpg.jpeg" 
     style="width:30px; height:30px; cursor:pointer;">
</a>
<a href="logout.php">Logout</a>
</div>
</div>

<div class="container">
<h1>📊 Admin Dashboard</h1>

<div class="grid">

<div class="card">
<h3>📚 Books</h3>
<p>Manage Library Books</p>
<a class="btn" href="books.php">Open</a>
</div>

<div class="card">
<h3>👥 Users</h3>
<p>View Registered Users</p>
<a class="btn" href="users.php">Open</a>
</div>

<div class="card">
<h3>📥 Requests</h3>
<p>Approve Book Requests</p>
<a class="btn" href="issue_books.php">Open</a>
</div>

<div class="card">
<h3>🔄 Book Status</h3>
<p>View Return Status</p>
<a class="btn" href="book_status.php">Open</a>
</div>

</div>

</div>

</body>
</html>