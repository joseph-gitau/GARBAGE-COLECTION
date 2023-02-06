<?php
// Connect to database
require_once 'db.php';
require_once 'index.php';

// Escape submitted values to prevent SQL injection
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$adress = mysqli_real_escape_string($conn, $_POST['adress']);
$phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
$collectiondate = mysqli_real_escape_string($conn, $_POST['collectiondate']);

// Insert values into table
$sql = "INSERT INTO requesttable (fullname, email, adress, phonenumber, collectiondate)
VALUES ('$fullname', '$email', '$adress', '$phonenumber', '$collectiondate')";

// if (mysqli_query($conn, $sql)) {
//   echo "Values inserted successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

mysqli_close($conn);