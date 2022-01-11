<?php
include "../db.php";
// session_start();
    
    if(isset($_POST['login'])){
        
        $username = $_POST['username']; 
        $password = md5($_POST['password']);

        $check_user = "Select * from user where username = '$username' AND password = '$password' AND role = '1'";
        $query_result = mysqli_query($conn,$check_user) or die("Query Failed");
        // $row_count = mysqli_fetch_row($query_result);
        // $active = $row_count['active'];
        // echo "<pre>";
        // print_r($row_count);
        $count = mysqli_num_rows($query_result);
        //If result matched 
        if($count > 0){
            while($row = mysqli_fetch_assoc($query_result)){
                session_start();
                // echo $row['username'];
                $_SESSION["username"] = $row['username'];
                $_SESSION["user_id"]  =  $row['id'];
                $_SESSION["user_role"] = $row['role'];
            }
            // session_register("username");
            // $_SESSION['login']=$username;

            header('LOCATION:dashboard.php');
        
        }else
        {
            echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/utils.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <br><br>
    <div class="container col-md-5">
    <h5 class="font5 heading-color register-background">Admin Login</h5>
        <div class="row">
            <form method="post" action="">
                <div class="mb-3 mt-3 form-design">
                    <label for="exampleInputEmail1" class="form-label"><br><b>Username</b> </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter username" name="username" require>
                </div>
                <div class="mb-3 form-design">
                    <label for="exampleInputPassword1" class="form-label"><b>Password</b> </label>
                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Write secretly..." name="password" require>
                </div><br>
                <center>
                    <div class="buttonn">
                        <button type="submit" name="login" value="Login" class="btn btn-success">Login</button>
                </center>
                <br><br>
            </form>
        </div>
</body>

</html>