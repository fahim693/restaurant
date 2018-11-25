<?php
session_start();
include "dbconnect.php";
$msg="";
if(isset($_POST['btn-submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $subject= mysqli_real_escape_string($conn,$_POST['subject']);
    $message = mysqli_real_escape_string($conn,$_POST['message']);

    mysqli_query($conn,"INSERT INTO support(_name,email,phone,_subject,_message) VALUES('$name','$email','$phone','$subject','$message')");
    $msg= "<div class='alert alert-info'>
    <strong>Successfully</strong> submitted. Please wait for our officials to contact you !
</div>";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Contact</title>

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

    <div class="container contact-section">
        <?php
        echo $msg;
        ?>
        <h1 class="my-4 text-center text-lg-left">Contact Form</h1>
        <form class="contact-form" method="post" action="contact.php">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="tel" name="phone" class="form-control" id="inputEmail4" placeholder="Phone" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" id="inputPassword4" placeholder="Subject" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Message</label><br>
                    <textarea name="message" class="form-control" rows="5" id="comment" required></textarea>
                    <!-- <input type="text" class="form-control" id="inputPassword4" placeholder="Subject"> -->
                </div>
            </div>
            <button type="submit" name="btn-submit" class="btn btn-primary">Submit</button>
        </form>
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