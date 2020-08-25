<?php
include_once 'conection.php';

    $content=$_POST['html'];
    
    $sql = "INSERT into users (Content) values ('$content')";
        if(!mysqli_query($mysqli1, $sql)){
            echo  'error';
        } else {
            echo 'uploaded';
        }
            header("refresh:2, url=admin.php")
?>