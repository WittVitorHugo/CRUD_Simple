<?php

//include 'connect.php';
include 'connectPostgreSQL.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM crud WHERE id = $id";
//$result = mysqli_query($con, $sql);
$result = pg_query($connection, $sql);
//$row = mysqli_fetch_assoc($result);
$row = pg_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE crud
                SET id = '$id', 
                    name = '$name', 
                    email = '$email', 
                    mobile = '$mobile', 
                    password = '$password' 
                WHERE id = '$id'";
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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD Update</title>
  </head>
  <body>
    <div class="container my-5">
        <h2>Update User</h2>
        <form method="POST">
            <div class="form-group my-2">
                <label class="form-label">Name</label>
                <input type="text" class="form-control"
                placeholder="Enter your name" name="name"
                autocomplete="off" value=<?php echo $name; ?>>
            </div>
            <div class="form-group my-3">
                <label class="form-label" >Email</label>
                <input type="email" class="form-control"
                placeholder="Enter your email" name="email"
                autocomplete="off" value=<?php echo $email; ?>>
            </div>
            <div class="form-group my-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control"
                placeholder="Enter your mobile number" name="mobile"
                autocomplete="off" value=<?php echo $mobile; ?>>
            </div>
            <div class="form-group my-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control"
                placeholder="Enter your password" name="password"
                autocomplete="off" value=<?php echo $password; ?>>
            </div>

            <button type="submit" class="btn btn-dark" name="submit">Update</button>
        </form>
    </div>
  </body>
</html>