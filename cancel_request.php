<?php
session_start();
include "db.php";

$id = $_GET['id'];

$sql = "UPDATE book_requests 
SET status='Cancelled' 
WHERE id='$id'";

mysqli_query($conn,$sql);

echo "<script>
alert('Request cancelled successfully');
window.location='my_books.php';
</script>";
?>