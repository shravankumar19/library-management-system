<?php
session_start();
include "db.php";

$username = $_SESSION['user'];

$sql = "SELECT 
book_requests.id,
books.book_name,
book_requests.status,
book_requests.issue_date,
book_requests.return_date,

CASE 
WHEN book_requests.return_date IS NULL THEN NULL
WHEN CURDATE() <= book_requests.return_date THEN NULL
ELSE DATEDIFF(CURDATE(), book_requests.return_date)
END AS fine

FROM book_requests

JOIN books 
ON book_requests.book_id = books.id

WHERE username='$username'";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Books</title>

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
    border-radius:10px;
    box-shadow:0px 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
h2{
    text-align:center;
    margin-bottom:20px;
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

/* STATUS COLORS */
.pending{
    color:orange;
    font-weight:bold;
}

.approved{
    color:green;
    font-weight:bold;
}

.returned{
    color:red;
    font-weight:bold;
}

/* BUTTON */
button{
    padding:6px 12px;
    cursor:pointer;
    background:#e74c3c;
    color:white;
    border:none;
    border-radius:5px;
}

button:hover{
    background:#c0392b;
}
</style>

</head>

<body>

<div class="navbar">
    <div>📚 My Books</div>
    <div><a href="login_dashboard.php">Home</a></div>
</div>

<div class="container">

<h2>Your Books</h2>

<table>

<tr>
<th>Book</th>
<th>Status</th>
<th>Issue Date</th>
<th>Return Date</th>
<th>Fine</th>
<th>Action</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result)){

$fine = ($row['fine'] === NULL) ? "-" : "₹".$row['fine'];

/* STATUS CLASS */
$statusClass = strtolower($row['status']);

echo "<tr>";

echo "<td>".$row['book_name']."</td>";
echo "<td class='$statusClass'>".$row['status']."</td>";
echo "<td>".$row['issue_date']."</td>";
echo "<td>".$row['return_date']."</td>";
echo "<td>".$fine."</td>";

echo "<td>";

if($row['status'] == 'Pending'){
echo "<a href='cancel_request.php?id=".$row['id']."' 
onclick=\"return confirm('Are you sure you want to cancel this request?');\">
<button>Cancel</button>
</a>";
}
else{
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