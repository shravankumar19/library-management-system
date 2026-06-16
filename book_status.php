<?php
session_start();
include "db.php";

$sql="SELECT 
book_requests.id,
book_requests.username,
books.book_name,
book_requests.status,
book_requests.issue_date,
book_requests.return_date,

CASE 
WHEN CURDATE() <= book_requests.return_date THEN '-'
ELSE DATEDIFF(CURDATE(), book_requests.return_date)
END AS fine

FROM book_requests

JOIN books
ON book_requests.book_id = books.id";

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Book Status</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
}

table{
border-collapse:collapse;
width:90%;
margin:auto;
background:white;
}

th,td{
padding:10px;
text-align:center;
border:1px solid #ccc;
}

h2{
text-align:center;
}

button{
padding:5px 10px;
cursor:pointer;
}

</style>

</head>

<body>

<h2>Books Status</h2>

<table>

<tr>
<th>ID</th>
<th>User</th>
<th>Book</th>
<th>Status</th>
<th>Issue Date</th>
<th>Return Date</th>
<th>Fine</th>
<th>Action</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

echo "<tr>

<td>".$row['id']."</td>
<td>".$row['username']."</td>
<td>".$row['book_name']."</td>
<td>".$row['status']."</td>
<td>".$row['issue_date']."</td>
<td>".$row['return_date']."</td>
<td>".$row['fine']."</td>

<td>";

if($row['status']=="Approved"){
echo "<a href='return_book.php?id=".$row['id']."'>
<button>Returned</button>
</a>";
}
else{
echo "-";
}

echo "</td>

</tr>";

}

?>

</table>

</body>
</html>