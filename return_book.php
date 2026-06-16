<?php

include "db.php";

$id = $_GET['id'];

/* Get book id */

$get = "SELECT book_id FROM book_requests WHERE id='$id'";
$result = mysqli_query($conn,$get);
$row = mysqli_fetch_assoc($result);

$book_id = $row['book_id'];

/* Update status */

$update = "UPDATE book_requests
SET status='Returned'
WHERE id='$id'";

mysqli_query($conn,$update);

/* Increase quantity */

$qty = "UPDATE books
SET quantity = quantity + 1
WHERE id='$book_id'";

mysqli_query($conn,$qty);

header("Location: book_status.php");

?>