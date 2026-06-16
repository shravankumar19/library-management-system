<?php

include "db.php";

$search = isset($_GET['search']) ? $_GET['search'] : "";
$category = isset($_GET['category']) ? $_GET['category'] : "";

$sql = "SELECT * FROM books 
        WHERE category='$category' 
        AND (book_name LIKE '%$search%' 
        OR author LIKE '%$search%')";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

echo "<tr>";

echo "<td>".$row['id']."</td>";

echo "<td>".$row['book_name']."</td>";

echo "<td>".$row['author']."</td>";

echo "<td>".$row['quantity']."</td>";

echo "<td>";

if($row['quantity'] > 0){
echo "<a href='request_book.php?id=".$row['id']."'>Request Book</a>";
}
else{
echo "Out of Stock";
}

echo "</td>";

echo "</tr>";

}

?>