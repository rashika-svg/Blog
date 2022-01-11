<?php
    session_start();
    include "db.php";

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        echo $id;
        $s = "0";
        $sql = "UPDATE user SET account='$s' where id=$id";
        $my = mysqli_query($conn, $sql);
        // if($my){
        //     echo "Done";
        // }
        // else{
        //     echo "Sad!!!!!!!!";
        // }
        
        header('location: home.php');
    }
?>