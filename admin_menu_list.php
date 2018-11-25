<?php
session_start();
include 'dbconnect.php';

$run=mysqli_query($conn,"select * from items");

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

    <div class="container ">
        <h1 class="my-4 text-center text-lg-left">Menu List</h1>
        <table width="100%" class="table">
            <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_assoc($run)){
                    $item_id=$row["item_id"];
                    $item_title=$row["item_title"];
                    $category=$row["item_category"];
                    $price=$row["item_price"];
                    $description=$row["item_description"];?>
                <tr>
                    <td><?php echo $category;?></td>
                    <td><?php echo $item_title;?></td>
                    <td><?php echo $price;?></td>
                    <td><?php echo $description;?></td>
                    <td><button type="submit" name="btn-edit"><a href="admin_menu_edit.php?id=<?php echo $item_id;?>">Edit</a></button></td>
                    <td><button type="submit" name="btn-delete"><a href="admin_menu_remove.php?id=<?php echo $item_id;?>">Delete</a></button></td>
                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Restaurant 2018</p>
        </div>
        <!-- /.container -->
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