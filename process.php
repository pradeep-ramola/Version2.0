<?php
 
$connect = mysqli_connect("localhost", "root","", "testing");
 
$no = $_GET['product'];
$quantity = $_GET['quantity'];
$item = $_GET['price'];
$ebg = $_GET['e'];

$sql = "UPDATE item SET item_price='$item',item_quantity='$quantity' WHERE item_name='$no' "; 
$data=mysqli_query($connect, $sql);
if ($data) {
  echo "processed  successfully";
  header("location:some.php");
}
 else{
   echo " UNSUCCESSFUL";
 }
















?>