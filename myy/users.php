<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99a910650.js" crossorigin="anonymous"></script>
    <style>
    .btn-success,
    .btn-danger {
        border-radius: 50px;
        padding: 3px 20px;
    }

    .green {
        color: green;
    }

    .red {
        color: red;
    }
    </style>
    <script>
    function deleteuser() {
        alert("Realy want to Delete");
    }
    </script>

</head>


<body>
    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left"><a href="../home.php"><img src="../img/img5.jpeg" alt=""></a>

            <!-- <span class="font5">GD</span> -->
        </div>

    </nav>
    <br>
    <div class="container">
        <table class="table table-success table-hover">
            <thead>
                <tr class="table-dark">
                    <th scope="col">S.No.</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../db.php';
                    $role="";
                    $selectquery = "select * from user";
                    $query = mysqli_query($conn, $selectquery);
                    // $nums = mysqli_num_rows($query);
                    $sn = 1;
                    while($result = mysqli_fetch_assoc($query))
                    {

                        
                        $role = $result['role'];
                        $id = $result['id'];
                        if($role=="1")
                            {$role = "Admin";}
                        else
                            {$role = "User";}
                    
                            echo "<tr>";
                            echo "<td>".$sn."</td>";
                            echo "<td>".$id."</td>";
                            echo "<td>".$result['fname']." ".$result['lname']. "</td>";
                            echo "<td>".$result['username']."</td>";
                            echo "<td>".$result['email']."</td>";
                            echo "<td>".$result['phone']."</td>";
                            echo "<td>".$role."</td>";
                            ?>
                <td><a href="update.php?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="top"
                        title="Edit/Update"><i class="far fa-edit green"></i></a></td>
                <td><a href="<?php if($role=="1"){ echo "#"; }else{ echo "delete.php?id=$id"; } ?>"
                        data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteuser()"><i
                            class="fas fa-trash-alt red"></i></a></td>

                <?php 
                            $sn++;   
                        }         
                        ?>
            </tbody>
        </table>
        <a href="dashboard.php"><button class="btn btn-dark text-center">Back to Dashboard</button></a>
    </div>
</body>

</html>