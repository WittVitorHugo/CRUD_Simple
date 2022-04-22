<?php

//include 'connect.php';
include 'connectPostgreSQL.php';


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "INSERT INTO crud (name, email, mobile, password)
            VALUES ('$name', '$email', '$mobile', '$password')";
    // $result = mysqli_query($con, $sql);
   
    // if($result) {
    //     // echo "Data inserted successfully";
    //     header('location:display.php');
    // } else {
    //     die(mysqli_error($con));
    // }
    $resu = pg_query($connection, $sql);
    if($connection) {
        header('location:display.php');
    } else {
        die(pg_errormessage($connection));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="POST">
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control"
                placeholder="Enter your name" name="name">
            </div>
            <div class="form-group my-3">
                <label class="form-label" >Email</label>
                <input type="email" class="form-control"
                placeholder="Enter your email" name="email">
            </div>
            <div class="form-group my-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control"
                placeholder="Enter your mobile number" name="mobile">
            </div>
            <div class="form-group my-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control"
                placeholder="Enter your password" name="password">
            </div>

            <button type="submit" class="btn btn-dark" name="submit">Submit</button>
        </form>
    </div>
  </body>
</html>