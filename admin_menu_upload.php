<?php
ini_set( "display_errors", 0); 
session_start();
include 'dbconnect.php';
$run=mysqli_query($conn,"select * from categories");
$msg="";
if(isset($_POST['btn-submit'])){
    $item_title=mysqli_real_escape_string($conn,$_POST['item_title']);
    $item_description=mysqli_real_escape_string($conn,$_POST['item_description']);
    $item_price=mysqli_real_escape_string($conn,$_POST['item_price']);
    $category_name = mysqli_real_escape_string($conn,$_POST['category']);
    $image = mysqli_real_escape_string($conn,file_get_contents($_FILES['image']['tmp_name']));
    // $image_name = addslashes($_FILES['image']['name']);

    mysqli_query($conn,"INSERT INTO items(item_title,item_description,item_price,item_category,item_image) VALUES('$item_title','$item_description','$item_price','$category_name','$image')");
    $msg= "<div class='alert alert-success'>
    <span>Successfully</span> added !
</div>";
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">
        

    </head>
</head>

<body class="body">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">My Restaurant</a>
            <!-- <a class="navbar-brand" href="index.html">Go to main site</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="admin_menu_upload.php">Upload Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="admin_menu_list.php">Menu List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="admin_support.php">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="admin_reservation_list.php">Reservation List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="admin.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container contact-section">
        <h1 class="my-4 text-center text-lg-left">Upload Item</h1>
        <?php
        echo $msg;
        ?>
        <form class="contact-form" method="post" action="admin_menu_upload.php" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <a type="submit" href='category.php'>Add Category</a>
                    <label>Category</label>
                    <div>
                        <!-- <label for="sel1">Select list:</label> -->
                        <select class="form-control" id="sel1" name="category">
                            <?php
                            while($row=mysqli_fetch_assoc($run)){?>
                                <option><?php 
                                $category_name=$row['category_name'];
                                echo $category_name;?></option>    
                            <?php
                            }
                            ?>
                            
                            <!-- <option>Category 2</option>
                            <option>Category 3</option> -->
                            <!-- <option>4</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="exampleFormControlFile1">Menu Image</label>
                    <input type="file" accept="image/*" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group col-md-12">
                    <label>Menu Title</label>
                    <input type="text" name="item_title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Menu Description</label><br>
                    <textarea class="form-control" name="item_description" rows="5" id="comment" required></textarea>
                    <!-- <input type="text" class="form-control" id="inputPassword4" placeholder="Subject"> -->
                </div>
                <div class="form-group col-md-12">
                    <label>Price</label>
                    <input type="text" name="item_price" class="form-control" placeholder="Price" required>
                </div>
            </div>
            <button type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
            <?php
            
            ?>
        </form>
    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Restaurant 2018</p>
        </div>
    </footer>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
</body>

</html>