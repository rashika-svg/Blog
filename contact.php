<?php 
include "db.php";
  if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $query = $_POST['query'];

      $sql="INSERT INTO contact (name,email,query) VALUES ('$name','$email','$query')";
      //Execute the query
      $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

      $mail_to = "rashika251298a.rv@gmail.com";
      $headers = "From: ".$email;
      $txt = "Query: ".$name.".\n\n".$query;

    //   mail($result,$txt,$headers); 
      header("Location: contact.php?mail_sent");
  }
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlamourDamsel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99a910650.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>

    <?php include "partials/navbar.php"; ?>
    <br>
    <div class="container-fluid backg">
        <div class="container px-4 contact-content ">
            <h2>We'd Love to help!!</h2>

            <div class="max-width-1 m-auto" style="color: white">
                <hr>
            </div>
            <div class="row gx-10">
                <div class="col-md-6">
                    <div class="contact-content2 p-3">
                        <form action="contact.php" method="POST">
                            <div class="mb-4">

                                <input type="text" name="name" class="form-control " placeholder="Name">

                            </div>
                            <div class="mb-4">

                                <input type="email" name="email" class="form-control " placeholder="Email address">

                            </div>
                            <div>

                                <textarea id="subject" name="query" class="form-control" style="height: 200px;"
                                    placeholder=" Your Query"></textarea>

                            </div><br>
                            <div class="btn-contact">
                                <button name="submit" class="btn btn-light ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-content3 p-3">
                        <p>
                            <i class="fas fa-map-marker-alt "></i>Roorkee, Uttarakhand
                        </p>
                        <p><i class="fas fa-headset "></i> +14325 64843566</p>
                        <p><i class="fas fa-envelope "></i> GlamourDamsel@GD.in</p>
                        <div style="color: rgb(216, 216, 216); width:80%;"><br>
                            <hr>
                        </div>
                        <div class="below-hr ">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f fa-lg "
                                    style="color: rgb(66, 124, 212);"></i></a>
                            <a href="https://www.linkedin.com/"><i class=" fab fa-linkedin-in fa-lg "
                                    style="color: rgb(58, 82, 223);"></i></a>
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter fa-lg "
                                    style="color: rgb(109, 162, 241);"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram-square fa-lg "
                                    style="color:rgb(219, 18, 129)"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "partials/footer.php"; ?>