<?php
 session_start();
include "db.php";
$id = 0;
// if($_SESSION['is_login'] != "true")
// {
//     $username = $_SESSION['username'];
    
//     $delete="";

//     $sql="select * from user where username='$username'";
//     $result = mysqli_query($conn, $sql);
//     while($row = mysqli_fetch_assoc($result)) {
//         $id = $row['id'];
//         $delete = $row['account'];
//     }
//     if($delete != "1")
//     {
//         $_SESSION['msg'] = "Your account doesn't exist.";
//         header('location: login.php');
//     }   
//  }


?>
<!-- window.confirm("Do you want to delete this?") -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>GlamourDamsel</title>

</head>

<body>

    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <img src="img/SEO.jpg" alt="">
            <!-- <span class="font5">GD</span> -->
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="nav-right">

            <?php if(isset($_SESSION['is_login'])){
            ?>
            <a href="logout.php"><button class="btn btn-outline-secondary btn-sm">Logout</button><a>
                    <a href="delete_account.php?id=<?php echo $id; ?>"
                        onclick='window.confirm("Do you want to delete this?")'><button
                            class="btn btn-outline-secondary btn-sm">Delete
                            Your Account</button></a>
                    <?php } 
                    if(!isset($_SESSION['is_login'])){
                    ?>
                    <a href="signup.php"><button class="btn btn-outline-secondary btn-sm">Signup</button></a>
                    <a href="login.php"><button class="btn btn-outline-secondary btn-sm">Login</button></a>
                    <?php } ?>

        </div>
    </nav>
    <div>
        <hr>
    </div>
    <?php  
        $sql = "SELECT * from post";
        $posts = mysqli_query($conn,$sql);
    ?>
    <div class="container col-8">
        <div class="row">
            <div class="col-7 font3"><br>
                <h2>Personal Blogsite</h2>

                <p class="font5">
                    The first thing you learn when you’re blogging is that people are one click away from leaving you.
                    So you’ve got to get to the point, you can’t waste people’s time, you’ve got to give them some value
                    for their limited attention span.
                </p>

            </div>
            <div class="col-3">
                <img src="img/img3.jpg">
            </div>
        </div>
    </div>

    <br>


    <div class="container home-article1 max-width-2 m-auto font3">
        <center>
            <h4 style="background-color: rgba(76 76 76 / 83%); color:seashell">Read Posts Here</h4>
        </center>

        <br>
        <?php 
            while($row = mysqli_fetch_assoc($posts)) {
        ?>
        <div class="row home-article2 max-width-2 m-auto pb-5">
            <div class="col-md-3"><br>
                <img src="uploads/<?=$row['img'];?>" style="width:150px;height:150px" alt="">
            </div>
            <div class="col-md-6">
                <div class="home-article2-content">
                    <br>
                    <h5 style="text-transform: uppercase;" class="font5"><?=$row['title'];?></h5>
                    <hr>
                    <p class="font5 postcontent">
                        <?=$row['content'];?></p>

                    <span style="font-size:large;"><?=$row['author'];?></span><br>

                </div>
            </div>
        </div><br>

        <?php
            }
        ?>

        <br><br><br><br>
    </div>
    <?php 
    include "partials/footer.php"
        
    ?>