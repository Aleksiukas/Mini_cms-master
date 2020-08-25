<?php

include "conection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($mysqli1,"delete from users where id = '$id'"); // delete query

if($del)
{
    mysqli_close($mysqli1); // Close connection
    header("location:admin.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>