<?php
include "../db.php";

$flg = false;

if (isset($_REQUEST['add_post']) && isset($_REQUEST['title']) && isset($_REQUEST['content']) && isset($_FILES["imgs"])) {
   if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author']) ) 
   {
    $title = $_REQUEST['title'];
    $author = $_REQUEST['author'];
    $content = $_REQUEST['content'];

    $target_dir = "../uploads/";
    $fname = md5(time());
    
    $target_file = $target_dir . basename($_FILES["imgs"]["name"]);

    $ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $target_file = $target_dir . $fname . "." . $ext;

    $fname = $fname . "." . $ext;

    move_uploaded_file($_FILES["imgs"]["tmp_name"], $target_file);

    $sql = "INSERT INTO post(title,author,content,img) VALUES('$title','$author','$content','$fname')";

    mysqli_query($conn, $sql);

    $flg = true;
    // header("location:dashboard.php?info=added");
   }else{ ?>
<script>
alert("Please fill all the fields.");
</script>
<?php }
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/utils.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Create</title>
</head>

<body>
    <div class="container col-6 mt-5">
        <h4 class="font5 text-center">Post Panel</h4>
        <hr>
        <?php if($flg) { ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Great!</strong> You have created a new post.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php } ?>

        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data"
            onsubmit="return validateForm();">
            <input name="title" id="title" type="text" placeholder="Blog Title"
                class="form-control bg-dark text-white my-3 text-center">
            <div>
                <label for="">Choose file:</label>

                <div class="btn btn-mdb-color btn-rounded float-left ">
                    <input type="file" name="imgs" id="imgs" class="form-control" />
                </div>
            </div>
            <input type="text" name="author" id="author" placeholder="Author Name" class="form-control">

            <textarea name="content" id="content" class="form-control bg-light text-dark my-3"
                placeholder="Write your post" style="height: 200px;"></textarea>

            <button name="add_post" id="addpost" class="btn btn-dark">Add Post</button>
            <a href="dashboard.php"><button class="btn btn-dark text-center">Back to Dashboard</button></a>
        </form>
    </div>

    <script>
    const validateForm = () => {
        let title = $("#title").val();
        let author = $("#author").val();
        let content = $("#content").val();
        if (title.length == 0 && author.length == 0 && content.length == 0) {
            alert("All feilds are mandatory!");
            return false;
        }
        return true;
    };
    // $(document).ready(function() {

    //     $("#title").focusout(function() {
    //         let title = $("#title").val();
    //         if (title == '') {
    //             alert("Please enter title of the post.");
    //         }
    //     });

    //     $("#author").focusout(function() {
    //         let author = $("#author").val();
    //         if (author == '') {
    //             alert("Please enter author name of the post.");
    //         }
    //     });
    //     $("#content").focusout(function() {
    //         let content = $("#content").val();
    //         if (content == '') {
    //             alert("Please enter content of the post.");
    //         }
    //     });

    // });
    </script>



</body>

</html>