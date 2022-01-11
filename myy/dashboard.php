<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b99a910650.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navigation max-width-1 m-auto">
        <div class="nav-left">
            <a href="../home.php"><img src="../img/img5.jpeg" alt=""></a>

            <!-- <span class="font5">GD</span> -->
        </div>
    </nav>
    <hr>

    <div class="container">
        <table class="table table-striped table-dark table-hover">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Dashboard</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><a href="create.php"><i class="fas fa-plus-circle fa-4x"></i></a></td>
                    <td class="text-center"><a href="complaint.php"><i class="fas fa-comments fa-4x"></i></a></td>
                    <td class="text-center"><a href="users.php"><i class="fas fa-user fa-4x"></i></a></td>

                </tr>
                <tr>
                    <th class="tr-link text-center"><a href="create.php">Create post</a></th>
                    <th class="tr-link text-center"><a href="complaint.php">Complaints</a></th>
                    <th class="tr-link text-center"><a href="users.php">Users table</a></th>

                </tr>


            </tbody>
        </table>
    </div>

</body>

</html>