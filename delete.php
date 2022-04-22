<?php

//include 'connect.php';
include 'connectPostgreSQL.php';

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM crud WHERE id=$id";
    //$result = mysqli_query($con, $sql);
    $result = pg_query($connection, $sql);
    if($result) {
        header('location:display.php');
    } else {
        //die(mysqli_error($con));
        die(pg_errormessage($connection));
    }
}

?>