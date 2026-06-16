<?php

include "db.php";

$id = $_GET['id'];

/* Get book id */

$get = "SELECT book_id FROM book_requests WHERE id='$id'";
$result = mysqli_query($conn,$get);
$row = mysqli_fetch_assoc($result);

$book_id = $row['book_id'];

/* Update request status */

$update = "UPDATE book_requests
SET status='Approved',
issue_date = CURDATE(),
return_date = DATE_ADD(CURDATE(), INTERVAL 30 DAY)
WHERE id='$id'";

mysqli_query($conn,$update);

/* Reduce book quantity */

$qty = "UPDATE books
SET quantity = quantity - 1
WHERE id='$book_id'";

mysqli_query($conn,$qty);

header("Location: issue_books.php");

?>