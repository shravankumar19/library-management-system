<?php
session_start();
include "db.php";

$username = $_SESSION['user'];
//$book_id = $_GET['id'];
if(isset($_POST['book_id'])){
    $book_id = $_POST['book_id'];
}
elseif(isset($_GET['id'])){
    $book_id = $_GET['id'];
}
else{
    die("Book ID missing");
}
/* Check if request already exists */

$check = "SELECT * FROM book_requests 
WHERE book_id='$book_id' 
AND username='$username'
AND status IN ('Pending','Approved')";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result) > 0){

echo "<script>
alert('You have already requested this book');
window.location='login_dashboard.php';
</script>";
echo "Book ID: ".$book_id;
exit();

}

/* Insert request */

$sql = "INSERT INTO book_requests(username,book_id,status)
VALUES('$username','$book_id','Pending')";

if(mysqli_query($conn,$sql)){

echo "<script>
alert('Book request sent to admin');
window.location='my_books.php';
</script>";

}
else{
echo mysqli_error($conn);
}
?>