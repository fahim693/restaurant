<?php    
include 'dbconnect.php';

$id=$_GET['id'];
// var_dump($id);
mysqli_query($conn,"DELETE FROM support WHERE support_id ='$id' ");
header('Location: admin_support.php');
?>