<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
    <link rel="stylesheet" href="../css/utils.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <img src="../img/img5.jpeg" alt="">
            <!-- <span class="font5">GD</span> -->
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <form action="/search.html">
                <input class="form-input" type="text" name="query" placeholder="Search here">
                <button class="btn1">Search</button>
            </form>
        </div>
    </nav>
    <!-- <div class="max-width-1 m-auto">
        <hr>
        
    </div> -->
    <hr>
    <br>

    <div class="container contain col-md-4"><br>
        
    <h4 class="font5 heading-color register-background"><u>Update Table</u></h4>
        <form action="" method="POST" style="margin:20px;">
            <div class="row form-design mb-3">
                <?php
                    include '../db.php';
                    if(isset($_GET['id'])) {
                        $ids = $_GET['id'];
                        $showquery = "select * from user where id={$ids}";
                        $showdata = mysqli_query($conn,$showquery);
                        $arraydata = mysqli_fetch_array($showdata);
                    }
                    else{
                        header('location: users.php');
                    }

                    if(isset($_POST['update'])){

                        $idupdate = $_GET['id'];

                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $username = $_POST['username'];
                        $account= $_POST['account'];

                        // $sql="INSERT INTO user (fname,lname,email,phone,username,password,cpassword) VALUES ('$fname', '$lname', '$email','$phone','$username','$password','$cpassword')";

                        $updatequery = "update user set id=$ids, fname='$fname',lname='$lname', username='$username', email='$email', phone='$phone', account='$account' where id=$idupdate  ";

                        $res = mysqli_query($conn,$updatequery);

                        if($res){
                            echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Data Updated');
                            </script>");
                            header('LOCATION:users.php');
                        }else{
                            echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Update Failed!');
                            </script>"); 
                        }
                    }
                        ?>

                <div class="row">
                    <div class="col-md">
                        <label for="exampleInputFname" class="form-label"><br><b>First Name</b> </label>
                        <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp"
                            placeholder="" name="fname" value="<?php echo $arraydata['fname']; ?>" aria-required="true">
                    </div>
                    <div class="col-md ">
                        <label for="exampleInputLname" class="form-label"><br><b>Last Name</b> </label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp"
                            placeholder="" name="lname" value="<?php echo $arraydata['lname']; ?>" aria-required="true">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="exampleInputFname" class="form-label"><br><b>Username</b> </label>
                        <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp"
                            placeholder="" name="username" value="<?php echo $arraydata['username']; ?>"
                            aria-required="true">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="exampleInputFname" class="form-label"><br><b>Email</b> </label>
                        <input type="email" class="form-control" id="exampleInputFname" aria-describedby="emailHelp"
                            placeholder="" name="email" value="<?php echo $arraydata['email']; ?>" aria-required="true">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="exampleInputLname" class="form-label"><br><b>Phone</b> </label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp"
                            placeholder="" name="phone" value="<?php echo $arraydata['phone']; ?>" aria-required="true">
                    </div>
                    <div class="col-md">
                        <label for="exampleInputLname" class="form-label"><br><b>Account</b> </label>
                        <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp"
                            placeholder="" name="account" value="<?php echo $arraydata['account']; ?>" aria-required="true">
                    </div>
                </div>
            </div>

            <!-- <div class="row form-design mb-5">
                    <div class=" col-sm-6">
                        <label for="exampleInputPassword1" class="form-label"><b>Password</b> </label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="********" name="password" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="exampleInputPassword1" class="form-label"><b>Re-Enter Password</b> </label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="********"
                            name="cpassword" required>
                    </div>
                </div> -->
            <center>
                <div class="buttonn ">
                    <!-- <input type="submit" name="signup" value="Signup" class="btn btn-success "> -->
                    <button type="submit" name="update" class="btn btn-success ">Update</button>
                </div>
            </center>
            
        </form>
    </div>
    <footer class="font5 fixed-bottom">
        Copyright@GDGlamourDamsel.com
    </footer>
</body>

</html>