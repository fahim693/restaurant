<?php
include 'dbconnect.php';
$run=mysqli_query($conn,"select * from items");   
$msg="";

if(isset($_POST['btn-submit'])){
    $_name=mysqli_real_escape_string($conn,$_POST['rname']);
    $_date=mysqli_real_escape_string($conn,$_POST['rdate']);
    $_email=mysqli_real_escape_string($conn,$_POST['remail']);
    $_phone = mysqli_real_escape_string($conn,$_POST['rphone']);
    $_note = mysqli_real_escape_string($conn,$_POST['note']);
    // $_orders=mysqli_real_escape_string($conn,$_POST['$title']);

    $quantity=isset($_POST['quantity']) ? $_POST['quantity'] : "" ;
    $title=isset($_POST['title']) ? $_POST['title'] : "" ;
    $price=isset($_POST['price']) ? $_POST['price'] : "" ;
    // $_price=mysqli_real_escape_string($conn,$_POST['rphone']);
    // $image_name = addslashes($_FILES['image']['name']);
    mysqli_query($conn,"INSERT INTO reservations(_name,_date,_email,_phone,_note) VALUES('$_name','$_date','$_email','$_phone','$_note')");
    $subtotal=0;
    foreach($quantity as $key=>$value){
        $total= $quantity[$key] * $price[$key];
        $subtotal= $subtotal + $total;
        // $quantity = $value;
        mysqli_query($conn,"INSERT INTO reservations(_orders,quantity,unit_price,total_price) VALUES('$title[$key]','$quantity[$key]','$price[$key]','$total')");
    }

    mysqli_query($conn,"INSERT INTO reservations(_note,subtotal) VALUES('Subtotal : ','$subtotal')");

    $msg= "<div class='alert alert-info'>
    <strong>Successfully</strong> placed. Please wait for confirmation !
</div>";
    
    // mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reservation</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body class="body">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">My Restaurant</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="menu.php?category=all">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="reservation.php">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
            </li>
          </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4 text-center text-lg-left">Reservation</h1>
        <hr>
        <?php
        echo $msg;
        ?>
        <form class="contact-form" method="post" action="reservation.php">
            <h3 style="text-align:center;padding: 15px;padding-bottom: 25px">Please fill out the form:</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Reservation for:</label>
                    <input type="text" name="rname" class="form-control" id="inputEmail4" placeholder="Name" required>
                </div>
                <div class='col-sm-6'>
                    <label>Reservation Date:</label>
                    <div class="form-group">
                        <div class='input-group date'>
                            <input type='date' name="rdate" id="datePicker" class="form-control" />
                            <!-- <i class="fas fa-calendar-alt"></i> -->
                            <!-- <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> -->
                            </span>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group col-md-6">
                    <label>Reservation Date:</label>
                    <input type="date" class="form-control"  placeholder="Name">
                </div> -->
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="remail" class="form-control" id="inputEmail4" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="tel" name="rphone" class="form-control" id="inputEmail4" placeholder="Phone" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Reservation Note(If any):</label><br>
                    <textarea class="form-control" name="note" rows="5" id="comment"></textarea>
                    <!-- <input type="text" class="form-control" id="inputPassword4" placeholder="Subject"> -->
                </div>
            </div>
            <h3 style="text-align:center;padding: 15px;padding-bottom: 45px">Choose your orders:</h3>
            <?php
            while($row=mysqli_fetch_assoc($run)){
                $title=$row['item_title'];
                $price=$row['item_price'];
                ?>
            
            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="data:image/*;base64,<?php echo base64_encode( $row['item_image'] )?>" alt="">
                    </a>
                </div>
                <div class="col-md-5">
                    <h5><?php echo $title;?></h5>
                    <p><?php echo $row['item_description'];?></p>
                    <h6><strong>Tk. <?php echo $price;?></strong></h6>
                    <!-- <a class="btn btn-primary" href="#">View Project</a> -->
                </div>
                <div class="col-md-3">

                    <div class="col-md-8">
                        <div class="input-group">
                            <!-- <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus"
                                    data-field="">
                                    <i class="fas fa-minus"></i>
                                   
                                </button>
                            </span> -->
                            <input type="hidden" name="title[]" value="<?php echo $title;?>">
                            <input type="hidden" name="price[]" value="<?php echo $price;?>">
                            <input type="text" id="quantity" name="quantity[]" class="form-control input-number" value="0"
                                min="1" max="100">
                            <!-- <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus"
                                    data-field="">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </span> -->
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php
            }
            ?>
            
            <div style="text-align:center">
                <button style="width:100%;padding:17px" type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
<?php

?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Restaurant 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <script>
        $(document).ready(function () {
            var now = new Date();

            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);

            var today = now.getFullYear() + "-" + (month) + "-" + (day);


            $('#datePicker').val(today);

            var quantity = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);
            });
            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });
        });
    </script>
</body>

</html>