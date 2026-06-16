<?php
session_start();

if(!isset($_SESSION['user'])){
header("Location: index.html");
exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>

<style>
body{
    font-family: Arial;
    margin:0;
    background: linear-gradient(135deg,#667eea,#764ba2);
}

/* NAVBAR */
.navbar{
    background: rgba(0,0,0,0.3);
    backdrop-filter: blur(10px);
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin-left:15px;
}

/* TITLE */
h2{
    text-align:center;
    margin-top:30px;
    color:white;
}

/* CARDS */
.cards{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    margin-top:30px;
    gap:25px;
}

/* CARD DESIGN */
.card{
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(15px);
    width:240px;
    padding:25px;
    border-radius:15px;
    text-align:center;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    transition:0.3s;
}

.card:hover{
    transform: translateY(-8px) scale(1.05);
}

/* LINK */
.card a{
    text-decoration:none;
    color:white;
}

/* TEXT */
.card h3{
    margin-bottom:10px;
}

.card p{
    font-size:14px;
    opacity:0.9;
}
</style>
</head>

<body>

<div class="navbar">

<div>👋 Welcome <?php echo $_SESSION['user']; ?></div>

<div>
<a href="about.php">
<img src="about.jpg.jpeg"
style="width:30px;height:30px;cursor:pointer;vertical-align:middle;">
</a>

<a href="logout.php">Logout</a>
</div>

</div>

<h2>📚 Library Sections</h2>

<div class="cards">

<div class="card">
<a href="my_books.php">
<h3>📖 My Books</h3>
<p>View issued books</p>
</a>
</div>

<div class="card">
<a href="category_books.php?category=Fiction">
<h3>📚 Fiction Books</h3>
<p>Explore novels and stories</p>
</a>
</div>

<div class="card">
<a href="category_books.php?category=Academic">
<h3>📖 Academic Books</h3>
<p>Engineering and subject books</p>
</a>
</div>

<div class="card">
<a href="category_books.php?category=Programming">
<h3>💻 Programming Books</h3>
<p>Java, Python, Web Development</p>
</a>
</div>

<div class="card">
<a href="category_books.php?category=Competitive">
<h3>🧠 Competitive Exams</h3>
<p>GATE, GRE, UPSC preparation</p>
</a>
</div>

<div class="card">
<a href="category_books.php?category=Magazines">
<h3>📰 Magazines</h3>
<p>Latest technology magazines</p>
</a>
</div>

<div class="card">
<a href="category_books.php?category=Journals">
<h3>📘 Journals</h3>
<p>Research publications</p>
</a>
</div>

</div>

</body>
</html>