<?php
session_start();
include 'dbconnect.php';
$run=mysqli_query($conn,"select * from reservations");   


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
        <style>
            .borderless td{
            border: none;
}
        </style>
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
        <h1 class="my-4 text-center text-lg-left">Reservation</h1>
        <table width="100%" class="table borderless table-striped">
            <thead>
                <tr>
                    <th width="15%" scope="col">Date of reservation</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Note</th>
                    <th width="35%" scope="col">Orders</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Subtotal</th>                    

                </tr>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_assoc($run)){?>
                <tr>
                    <td><?php echo $row['_date']?></td>
                    <td><?php echo $row['_name']?></td>
                    <td><?php echo $row['_phone']?></td>
                    <td><?php echo $row['_email']?></td>
                    <td><?php echo $row['_note']?></td>
                    <td><?php echo $row['_orders']?></td>
                    <td><?php echo $row['unit_price']?></td>
                    <td><?php echo $row['quantity']?></td>
                    <td><?php echo $row['total_price']?></td>
                    <td><?php echo $row['subtotal']?></td>
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