<?php    
include 'dbconnect.php';

$id=$_GET['id'];
// var_dump($id);
mysqli_query($conn,"DELETE FROM items WHERE item_id ='$id' ");
header('Location: admin_menu_list.php');
?>