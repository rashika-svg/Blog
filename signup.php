<?php
include "db.php";
include "partials/header.php";

    $email="";

if (isset($_POST['signup'])){
   
    $email = $_POST['email'];
    $credentials_check = "Select * from user where email = '$email'";

    $check_query = mysqli_query($conn,$credentials_check);
    // echo "<pre>";
    // print_r($row_count);
    if( mysqli_fetch_row($check_query)== 0){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password =md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        //$delete = "1";

    //Store in variable
    $sql="INSERT INTO user (fname,lname,email,phone,username,password,cpassword) VALUES ('$fname', '$lname', '$email','$phone','$username','$password','$cpassword')";

    //Execute the query
    $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered');
    window.location.href='login.php';
    </script>");
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Something Went Wrong!');
    window.location.href='signup.php';
    </script>");
    }
}
else{
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('User already exists');
    window.location.href='login.php';
    </script>");
}
}
?>

<br>
<div class="back-img3"><br><br><br>
    <div class="container contain col-md-4"><br>
        <h5 class="font5 heading-color register-background">Register Yourself!</h5>
        <form method="POST" style="margin:20px;">
            <div class="row form-design mb-4">

                <div class="col-md ">

                    <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp"
                        placeholder="First Name" name="fname" aria-required="true">
                </div>
                <div class="col-md ">

                    <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp"
                        placeholder="Last Name" name="lname" aria-required="true">
                </div>
            </div>
            <div class="row form-design mb-2">
                <div class="col-md">
                    <input type="text" class="form-control" id="exampleInputFname" aria-describedby="emailHelp"
                        placeholder="Username" name="username" aria-required="true">
                </div>

                <div class="col-md mb-3">

                    <input type="text" class="form-control" id="exampleInputLname" aria-describedby="emailHelp"
                        placeholder="Phone no." name="phone" aria-required="true">
                </div>

            </div>
            <div class="row form-design mb-4">
                <div class="col-md">
                    <input type="email" class="form-control" id="exampleInputFname" aria-describedby="emailHelp"
                        placeholder="example@domain.com" name="email" aria-required="true">
                </div>
            </div>
            <div class="row form-design mb-4">
                <div class=" col-md-6">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"
                        name="password" required>
                </div>
                <div class="col-md-6">

                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Re-enter Password" name="cpassword" required>
                </div>
            </div>
            <center>
                <div class="buttonn">
                    <!-- <input type="submit" name="signup" value="Signup" class="btn btn-success "> -->
                    <button type="submit" name="signup" value="Signup" class="btn btnn "> SignUp</button>

                </div>
            </center>

        </form>
    </div>

</div>
<?php include "partials/footer.php"; ?>