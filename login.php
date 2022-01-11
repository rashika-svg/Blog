<?php
include "db.php";
include 'partials/header.php';

session_start();
  
$username="";
$id = "";
$role="";
    if(isset($_POST['login'])){
        
        $username = $_POST['username']; 
        $password = md5($_POST['password']);

        $check_user = "Select * from user where username = '$username' AND password = '$password'";
      
        $query_result = mysqli_query($conn,$check_user);
        $row_count = $rows = mysqli_num_rows($query_result);
        
        // This code was totally waste before...
        while($row = mysqli_fetch_assoc($query_result)){
            $username = $row['username'];
            $id = $row['id'];
            $role = $row['role'];
            
        }
        
        // $active = $row_count['active'];
        // echo "<pre>";
        // print_r($row_count);


       $count = mysqli_num_rows($query_result);

        //If result matched 
        if($count == 1){
            $_SESSION['is_login']="true";
            $_SESSION['username']=$username;
            if($role == 1){
                header('Location: myy/dashboard.php');
            }else{
                header('Location: home.php');
            }
        
        }else
        {
            echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }
    }
    echo $role;

?>

<div class="back-img">
    <div>
        <hr>
        <br>
    </div>

    <div class="container contain col-md-6">

        <div class="row justify-content-center">

            <div class="col-md-6">
                <br>
                <h5 class="font5 heading-color1">Welcome Folks!!</h5>
                <p>
                    <?php 
                            if(isset($_SESSION['msg'])) {
                                if($_SESSION['msg']!=""){ 
                                    echo $_SESSION['msg']; unset($_SESSION['msg']); 
                                }
                            }
                        ?>
                </p>

                <form method="post" action="">
                    <div class=" col mb-3 mt-3 form-design">
                        <label for="exampleInputEmail1" class="form-label"><br><b>Username</b> </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter username" name="username" required>
                    </div>
                    <div class="col mb-3 form-design">
                        <label for="exampleInputPassword1" class="form-label"><b>Password</b> </label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Write secretly..." name="password" required>
                    </div><br>
                    <center>
                        <div class="buttonn">
                            <button type="submit" name="login" value="Login" class="btn btn-success">Login</button>
                    </center>
                </form>
                <div class="font1">
                    <center>
                        or
                    </center>
                </div>
                <div class="create font5">
                    <h6>Don't have an account ?</h6>
                    ..<a href="signup.php">Create a new one</a>..
                </div>
                <br>

            </div>
            <div class="col-sm-6">
                <div class="image">
                    <img src="img/flower.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php

include 'partials/footer.php';

?>