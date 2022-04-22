<?php

//include 'connect.php';
include 'connectPostgreSQL.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD Display</title>
</head>
<body>
    
    <div class="container">
        <button class="btn btn-dark my-5" >
            <a href="user.php" class="text-light" style="text-decoration: none;">
                Add User
            </a>
        </button>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">Sl no</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Password</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql = "SELECT * FROM crud";
                //$result = mysqli_query($con, $sql);
                $result = pg_query($connection, $sql);
                if($result) {
                    //while($row = mysqli_fetch_assoc($result)) {
                    while($row = pg_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];
                        echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$mobile.'</td>
                            <td>'.$password.'</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info">
                                        <a href="update.php?updateid='.$id.'" class="text-light" style="text-decoration: none;">Update</a>
                                    </button>
                                    <button type="button" class="btn btn-info">
                                        <a href="delete.php?deleteid='.$id.'" class="text-light" style="text-decoration: none;">Delete</a>
                                    </button>
                                </div>
                            </td>
                            </tr>';
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
