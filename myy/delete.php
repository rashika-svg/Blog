<?php include '../db.php';
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM user where id='$id'";
    mysqli_query($conn,$sql);
    header('location: users.php');
    }
    ?>
