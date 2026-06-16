<?php
include "db.php";
$category = $_GET['category'];
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $category; ?> Books</title>

<style>
body{
    font-family: Arial;
    margin:0;
    background: linear-gradient(135deg,#667eea,#764ba2);
}

/* NAVBAR */
.navbar{
    background: rgba(0,0,0,0.3);
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
}

.navbar a{
    color:white;
    text-decoration:none;
}

/* CONTAINER */
.container{
    width:90%;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0px 10px 30px rgba(0,0,0,0.2);
}

/* TITLE */
h2{
    text-align:center;
    margin-bottom:20px;
}

/* SEARCH */
.search-box{
    text-align:center;
    margin-bottom:20px;
}

.search-box input{
    padding:10px;
    width:40%;
    border-radius:6px;
    border:1px solid #ccc;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#34495e;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f1f1;
}

/* BUTTON */
button{
    padding:6px 12px;
    background:#2ecc71;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#27ae60;
}

/* BACK */
.back{
    display:inline-block;
    margin-top:15px;
    text-decoration:none;
    font-weight:bold;
    color:#333;
}
</style>

<script>
function searchBooks(){

let search = document.getElementById("search").value;

let category = "<?php echo $category; ?>";

fetch("search_books.php?search="+search+"&category="+category)

.then(response => response.text())

.then(data => {
document.getElementById("bookTable").innerHTML = data;
});

}
</script>

</head>

<body>

<div class="navbar">
    <div>📚 <?php echo $category; ?> Books</div>
    <div><a href="login_dashboard.php">Home</a></div>
</div>

<div class="container">

<h2><?php echo $category; ?> Books</h2>

<div class="search-box">
<input type="text" id="search" placeholder="🔍 Search book or author"
onkeyup="searchBooks()">
</div>

<table>

<thead>
<tr>
<th>ID</th>
<th>Book Name</th>
<th>Author</th>
<th>Quantity</th>
<th>Request</th>
</tr>
</thead>

<tbody id="bookTable">

<?php

$sql="SELECT * FROM books WHERE category='$category'";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){
echo "<tr>
<td>".$row['id']."</td>
<td>".$row['book_name']."</td>
<td>".$row['author']."</td>
<td>".$row['quantity']."</td>
<td>
<form action='request_book.php' method='POST'>
<input type='hidden' name='book_id' value='".$row['id']."'>
<button type='submit'>Request</button>
</form>
</td>
</tr>";
}

?>

</tbody>

</table>

<a class="back" href="login_dashboard.php">⬅ Back</a>

</div>

</body>
</html>